<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class=" col-md-6 ">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            مجموع الاطباق المسجلة </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $params['meals'] ?></div>
                    </div>

                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>

                    </div>
                    <div>
                        <br>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<br>

<!-- Earnings (Monthly) Card Example -->


<div class="card border-left-warning align-items-center ">
    <div class="card-body">
        <h3>شنو غناكل اليوم</h3>
        <form action="/decide" method="POST">
            <label>حدد أي وجبة</label>
            <div class="py-2">
                <select class="form-control" name="meal">
                    <option value="launch">الغذاء</option>
                    <option value="dinner">العشاء</option>

                </select>
            </div>
            <label> نوع الطبق</label>
            <div class="py-2">
                <select class="form-control" name="supp">
                    <option value="no">طبق رئيسي</option>
                    <option value="yes">طبق ثانوي</option>

                </select>
            </div>
            <div class="py-4">
                <input type="submit" class="btn btn-warning" value="سير نشوفو">
            </div>

        </form>

        <?php if (isset($params['decision'])) : ?>   
                <h2> كنقتارحو عليك </h2>
            <div class="alert alert-success">
                <?php foreach ($params['decision'] as $decision) : ?>
                    <h4> <?= $decision->meal == 'launch' ? 'الغذاء' : 'العشاء' ?> </h4>
                    <h4> <?= $decision->type == 'principal' ? 'طبق رئيسي' : 'طبق ثانوي' ?> </h2>
                    <h2> <?= $decision->name ?> </h5>
                <?php endforeach; ?>
            </div>
    </div> <?php endif; ?>

</div>


<br><br>