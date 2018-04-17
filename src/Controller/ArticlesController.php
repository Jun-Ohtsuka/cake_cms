<?php
// src/Controller/ArticlesController.php

namespace App\Controller;

use App\Controller\Controller;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;

class ArticlesController extends AppController
{
  public function initialize()
  {
    parent::initialize();

    $this->Auth->allow(['display']);
    $this->loadComponent('Paginator');
    $this->loadComponent('Flash'); // FlashComponent をインクルード
    $this->loadComponent('Check'); //自作componentをインクルード
  }

  public function index()
  {
    $query = TableRegistry::get('Articles');
    $data = $query->find('all', ['contain' => ['Users', 'Tags']]);
    // pr($data);

    $articles = $this->Paginator->paginate($data);
    $this->set(compact('articles'));
  }

  public function view($slug)
  {
    $article = $this->Articles->findBySlug($slug)->firstOrFail();
    $this->set(compact('article'));
  }

  public function add()
  {
    $article = $this->Articles->newEntity();
    if ($this->request->is('post')) {
      $article = $this->Articles->patchEntity($article, $this->request->getData());

      // 変更: セッションから user_id をセット
      $article->user_id = $this->Auth->user('id');

      if ($this->Articles->save($article)) {
        $this->Flash->success(__('Your article has been saved.'));
        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('Unable to add your article.'));
    }
    // タグのリストを取得
    $tags = $this->Articles->Tags->find('list');

    // ビューコンテキストに tags をセット
    $this->set('tags', $tags);

    $this->set('article', $article);
  }

  public function edit($slug)
  {
    // 関連づけられた Tags を読み込む
    $article = $this->Articles->findBySlug($slug)->contain('Tags')->firstOrFail();

    if ($this->request->is(['post', 'put'])) {
      //user_idの更新を無効化
      $this->Articles->patchEntity($article, $this->request->getData(), ['accessibleFields' => ['user_id' => false]]);
      if ($this->Articles->save($article)) {
        $this->Flash->success(__('Your article has been updated.'));
        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('Unable to update your article.'));
    }
    $this->set('article', $article);

    // タグのリストを取得
    $tags = $this->Articles->Tags->find('list');

    // ビューコンテキストに tags をセット
    $this->set('tags', $tags);
  }

  public function delete($slug)
  {
    $this->request->allowMethod(['post', 'delete']);

    $article = $this->Articles->findBySlug($slug)->firstOrFail();
    if ($this->Articles->delete($article)) {
      $this->Flash->success(__('The {0} article has been deleted.', $article->title));
      return $this->redirect(['action' => 'index']);
    }
  }

  public function tags()
  {
    //送信されたname=passの文字列を取得する
    $strPass = $this->request->query['pass'];
    $exploded = $this->Check->multiexplode([' ', '　', ',', '	'], $strPass);
    // pr($exploded);

    //空要素を削除し、keyを再番する
    $tags = array_merge(Hash::filter($exploded));
    // pr($tags);

    // ArticlesTable を使用してタグ付きの記事を検索します。
    $articles = $this->Articles->find('tagged', ['tags' => $tags]);

    // 変数をビューテンプレートのコンテキストに渡します。
    $this->set(['articles' => $articles, 'tags' => $tags]);
  }

  public function isAuthorized($user)
  {
    $action = $this->request->getParam('action');
    // add および tags アクションは、常にログインしているユーザーに許可されます。
    if (in_array($action, ['add', 'tags', 'view', 'index'])) {
      return true;
    }

    // 他のすべてのアクションにはスラッグが必要です。
    $slug = $this->request->getParam('pass.0');
    if (!$slug) {
      return false;
    }

    //管理者ユーザはすべてのアクションが許可される。
    if ($user['role_id'] === 1) {
      return true;
    }

    // 記事が現在のユーザーに属していることを確認します。
    $article = $this->Articles->findBySlug($slug)->first();

    return $article->user_id === $user['id'];
  }
}
