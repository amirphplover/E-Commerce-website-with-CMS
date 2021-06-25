  <footer class=" mt-5 pt-2">
    <div class="container">
      <div class="row footer">

        <div class="col-md-4">
          <ul class="mt-4 list-group">
            <li class="list-group-item  d-flex flex-row-reverse"><p>ارتباط با ما</p></li>

            <li class="list-group-item d-flex flex-row-reverse"><a href="">درباره ما</a></li>
            <li class="list-group-item d-flex flex-row-reverse"><a href="">تماس با ما</a></li>
            <li class="list-group-item d-flex flex-row-reverse"><a href="">سوالات متداول</a></li>
            <li class="list-group-item d-flex flex-row-reverse"><a href="">تلفن تماس   _ 09382571764</a></li>
            <li class="list-group-item  d-flex flex-row-reverse"><a href="">amirfz@gmail.com :ایمیل</a></li>
          </ul>
        </div>

        <div class="col-md-4">
          <ul class="list-group mt-4">
            <li class="list-group-item  d-flex flex-row-reverse"><p>دسته های محصولات</p></li>
              <?php 
              $category = new category;
              $val = $category->getAllcat(); ?>
              <li class="list-group-item  d-flex flex-row-reverse"><a href="#">همه محصولات </a></li>
               <?php foreach($val as $row){ ?>
               <li class="list-group-item  d-flex flex-row-reverse"><a href="#"><?php echo $row['category_name'];?></a></li>
               <?php } ?>
          </ul>
        </div>

        <div class="col-md-4">
          <ul class="mt-4 list-group">
            <li class="list-group-item d-flex flex-row-reverse"><p>ارتباط با ما</p></li>

            <li class="list-group-item d-flex flex-row-reverse"><a href="">درباره ما</a></li>
            <li class="list-group-item d-flex flex-row-reverse"><a href="">تماس با ما</a></li>
            <li class="list-group-item d-flex flex-row-reverse"><a href="">سوالات متداول</a></li>
            <li class="list-group-item d-flex flex-row-reverse"><a href="">تلفن تماس   _ 09382571764</a></li>
            <li class="list-group-item d-flex flex-row-reverse"><a href="">amirfz@gmail.com :ایمیل</a></li>

          </ul>
        </div>

      </div><!-- row -->


      <div class="row">
        <div class="col-12 mt-5 text-center">
          <p>حقوق این سایت  مطعلق به اف زد میباشد</p>
        </div>
      </div>
    </div>
  </footer>