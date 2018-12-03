<div class = "container">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $users = AdminQuery::create()->find();
                    foreach($users as $p){
                ?>		
                <tr>
                    <th scope="row"><?php echo $p->getId(); ?></th>
                    <td><?php echo $p->getUsername(); ?></td>
                </tr>


                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
