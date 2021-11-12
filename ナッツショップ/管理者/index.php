<?php include '../header.php'; ?>

<div class="container">
  <h2 class="h2">店舗管理画面ホーム</h2>
  <div class="row">
    <div class="col-sm-4"><?php include './sidebar.php' ?></div>
    <div class="col-sm-8">
      <h3 class="h3">受注状況</h3>
      <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
        支払い待ち
          <span class="badge badge-primary badge-pill">14</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
        未発送
          <span class="badge badge-primary badge-pill">2</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
        発送済
          <span class="badge badge-primary badge-pill">1</span>
        </li>
      </ul>    
    </div>
  </div>
</div>
Z:\DocumentRoot\chapter6\admin\index.php