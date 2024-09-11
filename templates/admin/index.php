<?
include_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/header.php';
?>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="/admin">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file"></span>
              Blogs
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Integrations
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Year-end sale
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <h2>Section title</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>ID</th>
              <th>Картинка</th>
              <th>Заголовок</th>
              <th>Время создания</th>
              <th></th>
            </tr>
          </thead>
            <? while ($row = $stmt->fetch()): ?>
          <tbody>
            <tr>
              <td><?=$row['id']?></td>
              <td><img width="150" src="/images/<?=$row['img']?>" alt="<?=$row['title']?>"></td>
              <td><?=$row['title']?></td>
              <td><?=$row['createdAt']?></td>
              <td>
                <a href="/admin/?act=edit&id=<?=$row['id']?>"><button type="button" class="btn btn-primary">Редактировать</button></a>
                <a href="/admin/?act=delete&id=<?=$row['id']?>"><button type="button" class="btn btn-danger">Удалить</button></a>
              </td>
            </tr>        
          </tbody>
          <? endwhile ?>
        </table>
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <? for ($i = 1; $i <= $pages; $i++):?>
              <li class="page-item"><a class="page-link" href="/admin/?page=<?=$i?>"><?= $i?></a></li>
            <? endfor ?>
            
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
          </ul>
        </nav>
      </div>
    </main>
  </div>
</div>

<?
include_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/footer.php';
?>
