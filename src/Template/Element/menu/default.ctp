<nav class="navbar navbar-expand-sm fixed-top navbar-dark bg-primary">
  <?=$this->Html->link("Title", "/products/index", ["class"=>"navbar-brand"]); ?>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
      <?=$this->Html->link("商品一覧", "/products/index", ["class"=>"nav-link text-white"]);?>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          商品一覧
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?=$this->Html->link("一覧", "/products/index", ["class"=>"dropdown-item"]);?>
          <?=$this->Html->link("新規追加", "/products/add", ["class"=>"dropdown-item"]);?>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-dark my-2 my-sm-0" type="submit">Search</button>
    </form>
    <ul class="navbar-nav">
      <li class="nav-item">
      <?=$this->Html->link("ログイン", "/products/index", ["class"=>"nav-link text-white"]);?>
      </li>
    </ul>
  </div>
</nav>