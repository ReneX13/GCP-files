<div class = "container">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Paypal</th>
                    <th scope="col">Join Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $users = UsersQuery::create()->find();
                    foreach($users as $p){
                ?>		
                <tr>
                    <th scope="row"><?php echo $p->getId(); ?></th>
                    <td><?php echo $p->getFirstName(); ?></td>
                    <td><?php echo $p->getLastName(); ?></td>
                    <td><?php echo $p->getEmail(); ?></td>
                    <td><?php echo $p->getPaypalEmail(); ?></td>
                    <td><?php echo $p->getJoinDate()->format('m/d/y h:i a'); ?></td>
                </tr>


                <?php } ?>
            </tbody>
        </table>
    </div>
</div>