<?php if (isset($_GET['addsuccess'])) : ?>
  <div class="alert alert-success">
    <p> تم إضافة الطبق بنجاح </p>
  </div>
<?php endif; ?>
<?php if (isset($_GET['updatesuccess'])) : ?>
  <div class="alert alert-success">
    <p> تم تعديل الطبق بنجاح </p>
  </div>
<?php endif; ?>
<?php if (isset($_GET['deletesuccess'])) : ?>
  <div class="alert alert-success">
    <p> تم حذف الطبق بنجاح </p>
  </div>
<?php endif; ?>
<?php if (isset($_GET['errors'])) : ?>
  <div class="alert alert-danger">
    <p> <?= $_GET['errors'] ?></p>
  </div>
<?php endif; ?>
<div class="card shadow mb-4">
  <div class="card-header py-3">


    <a href="" class="btn btn-primary btn-icon-split btn-sm " data-toggle="modal" data-target="#addacademy">
      <span class="icon text-white-40">
        <i class="fa fa-plus"></i>
      </span>
      <span class="text">
        <p> إضافة طبق </p>
      </span>
    </a>
    <!-- The Modal -->
    <div class="modal fade" id="addacademy">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">إضافة طبق</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div align="center">
              <img src="../../public/img/undraw_relaxing_at_home_re_mror.svg" style="width: 35%; height: 20%">

              <p style="padding-top: 3%">أضف طبق</p>
            </div>
            <br>
            <form action="/addmeal" method="POST">
              <div class="py-4">
                <input type="text" name="name" class="form-control" placeholder="إكتب إسم الطبق ">
              </div>
              <div class="py-4">
                <select class="form-control" name="meal">
                  <option value="launch">الغذاء</option>
                  <option value="dinner">العشاء</option>

                </select>
              </div>
              <div class="py-4">
                <select class="form-control" name="type">
                  <option value="supp">(مقبلات)طبق خفيف</option>
                  <option value="principal">طبق رئيسي</option>

                </select>
              </div>
              <input type="hidden" name="created_at" value="<?= date('Y-m-d'); ?>">



              <button class="btn btn-success text-light" type="submit" name="add">
                إضافة</button>
              &nbsp; <button class="btn btn-danger" data-dismiss="modal"> Annuler </button>
            </form>

          </div>

          <!-- Modal footer
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div> -->

        </div>
      </div>
    </div>



  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> # </th>
            <th> إسم الطبق </th>
            <th> النوع </th>
            <th> الطبق </th>
            <th> تعديل أو حذف </th>
          </tr>
        </thead>
        <tbody>
          <?php if ($params['meals'] != null) :
          ?>
            <?php foreach ($params['meals'] as $meal) :
            ?>
              <tr>
                <td> <?= $meal->id ?> </td>
                <td> <?= $meal->name ?></td>
                <td> <?= $meal->type == 'principal' ? 'طبق رئيسي' : 'طبق خفيف'  ?></td>
                <td><?= $meal->meal == 'launch' ? 'الغذاء' : 'العشاء' ?> </td>
                <td> <a href="/editmeal/<?= $meal->id ?>" class="btn btn-info btn-circle" data-toggle="modal" data-target="#edit<?= $meal->id ?>"> <i class="fa fa-pen"></i></a>
                  <!-- The Modal -->
                  <div class="modal fade" id="edit<?= $meal->id ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">تعديل الطبق</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                          <div align="center">
                            <img src="../../public/img/undraw_coming_home_re_ausc.svg" style="width: 35%; height: 20%">

                            <p style="padding-top: 3%">تعديل الطبق</p>
                          </div>
                          <br>
                          <form action="/editmeal/<?= $meal->id ?>" method="POST">

                            <div class="py-4">
                              <label class="px-2">إسم الطبق: </label>
                              <input type="text" name="name" class="form-control" placeholder="" value="<?= $meal->name ?>">
                            </div>


                              <button class="btn btn-success text-light" type="submit">
                                Modifier</button>
                              &nbsp; <button class="btn btn-danger" data-dismiss="modal"> Annuler </button>
                          </form>

                        </div>

                        <!-- Modal footer
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div> -->

                      </div>
                    </div>
                  </div>


                
                  <a href="/deletemeal" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#myModal<?= $meal->id ?>"> <i class="fa fa-trash"></i></a>


                  <!-- The Modal -->
                  <div class="modal fade" id="myModal<?= $meal->id ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">إحذف الطبق</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                          <div align="center">
                            <img src="../../public/img/undraw_throw_away_re_x60k.svg" style="width: 45%; height: 25%">

                            <p style="padding-top: 3%">هل تريد حقا حذف هذا الطبق ؟ </p>
                          </div>
                          <br>
                          <form action="/deletemeal/<?= $meal->id ?>" method="POST">

                            <button class="btn btn-danger text-light" type="submit">
                              نعم </button>
                            &nbsp; <button class="btn btn-success" data-dismiss="modal"> لا </button>
                          </form>

                        </div>

                        <!-- Modal footer
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div> -->

                      </div>
                    </div>
                  </div>
                 
                </td>
              </tr>
            <?php endforeach;
            ?>
          <?php endif;
          ?>

        </tbody>
      </table>
    </div>

  </div>
</div>