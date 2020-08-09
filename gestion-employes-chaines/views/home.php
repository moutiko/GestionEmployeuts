<?php

    if(isset($_POST['find'])){
        $data = new EmployesController();
        $employes = $data->findEmployes();
    }else{
        $data = new EmployesController();
        $employes = $data->getAllemployes();
    }
    

?>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-10 mx-auto">
        <?php include('./views/includes/alerts.php');?>
            <div class="card">
                <div class ="card-body bg-light">
                   <a href="<?php echo BASE_URL; ?>add" class="btn btn-sm btn-primary mr-2 mb-2"> 
                   <i class="fas fa-plus"></i>
                   </a>
                   <a href="<?php echo BASE_URL;?>" class="btn btn-sm btn-secondary mr-2 mb-2"> 
                   <i class="fas fa-home"></i>
                   </a>
                    </a>
                   <a href="<?php echo BASE_URL;?>logout" titlt="Déconnexion" class="btn btn-link  mr-2 mb-2"> 
                   <i class="fas fa-user mr-2"> <?php echo $_SESSION['username'];?></i>
                   </a>
                   <form method="post" class="float-right mb-2 d-flex flex-row">
                        <input type="text" name="search" classe="form-control" placeholder="Recherche">
                        <button class="btn btn-info btn-sm" name="find" type="submit"><i class="fas fa-search"></i></button>
                   </form>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nom & Prenom</th>
                                <th scope="col">matricule</th>
                                <th scope="col">departement</th>
                                <th scope="col">poste</th>
                                <th scope="col">Date Embauche</th>
                                <th scope="col">statut</th>
                            </tr>
                        </thead>
                        <tbody>
                      <?php
                            foreach($employes as $employe){
                                $date_emb = new DateTime($employe['date_emb']);
                                
                                ?>
                            <tr>
                                <td><?php echo $employe['nom'].' '.$employe['prenom']; ?></td>
                                <td><?php echo $employe['matricule']; ?></td>
                                <td><?php echo $employe['depart']; ?></td>
                                <td><?php echo $employe['poste']; ?></td>
                                <td><?php echo $date_emb->format('d M Y'); ?></td>                     
                                <td><?php echo $employe['statut']?'<span class="badge badge-success">Active</span>' :
                                '<span class="badge badge-danger">Résilier</span>'; ?></td>                     
                                <td class='d-flex flex-row'>
                                <form method="post" class="mr-1" action="update">
                                <input type="hidden" name="id" value=<?php echo $employe['id']; ?>>
                                <button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                                </form>
                                <form method="post" class="mr-1" action="delete">
                                <input type="hidden" name="id" value=<?php echo $employe['id']; ?>>
                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                                </td>
                            </tr>  
                            <?php } ?>                                                                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>