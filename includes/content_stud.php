
    <div class="row mt-5 flex-row">
        <div class="title col-lg-4 col-md-6 col-sm-12">
            <h2>Students List</h2>
        </div>
        <div class="d-flex gap-2 align-items-center justify-content-end col-lg-8 col-md-6 col-sm-12">
            <div style="font-size: 1.5rem;">
                <i class="fas fa-sort text-primary"></i>
            </div>
            <div>
                <a href="#" class="btn btn-primary text-uppercase">add new student</a>
            </div>
        </div>
        <hr>
    </div>
    <div class="row mt-5 px-5">
        <table class="table">
            <thead>
                <tr class="">
                    <th scope="col"></th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Enroll number</th>
                    <th scope="col">Date of admission</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="flex-column gap-2">

                <?php
                    include '../includes/tab_stud.php';
                ?>

            </tbody>
        </table>
    </div>
