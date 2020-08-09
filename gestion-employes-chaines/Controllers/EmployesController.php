<?php

class EmployesController{

    public function getAllEmployes(){
        $employes = Employe::getAll();
        return $employes;

    }

    public function  getOneEmploye(){
        if(isset($_POST['id'])){
            $data = array(
                'id'=>$_POST['id']               
            );         
            $employe = Employe::getEmploye($data);
            return $employe;
        }
        

    }

    public function findEmployes(){
        if(isset($_POST['search'])){
            $data = array('search'=> $_POST['search']);
        }
        $employes =Employe::searchEmploye($data);
        return $employes;


    }

    public function updateEmploye(){
        if(isset($_POST['submit'])){

            $date_emb= new DateTime($_POST['date_emb']); //Get object Datetime for trans
            $data = array(
                'id' => $_POST['id'],
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'matricule' => $_POST['mat'],
                'depart' => $_POST['depart'],
                'poste' => $_POST['poste'],
                'date_emb' => $date_emb->format('Y-m-d H:i:s'), //conversion to DateTime
                'statut' => $_POST['statut'],
            );
            $result= Employe::update($data);
            if($result === 'ok'){
                Session::set('success','Employé Modifier');
                Redirect::to('home');

            }else{
                echo $result;
            }
        }
    }

    public function addEmploye(){
        if(isset($_POST['submit'])){

            $date_emb= new DateTime($_POST['date_emb']); //Get object Datetime for trans
            $data = array(
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'matricule' => $_POST['mat'],
                'depart' => $_POST['depart'],
                'poste' => $_POST['poste'],
                'date_emb' => $date_emb->format('Y-m-d H:i:s'), //conversion to DateTime
                'statut' => $_POST['statut'],
            );
            $result= Employe::add($data);
            if($result === 'ok'){
                Session::set('success','Employé Ajouter');

                Redirect::to('home');

            }else{
                echo $result;
            }
        }
    }

    public function deleteEmploye(){
        if(isset($_POST['id'])){
            $data['id'] = $_POST['id'];
            $result = Employe::delete($data);
            if($result === 'ok'){
                Session::set('success','Employé Superimer');
                Redirect::to('home');
            }else{
                echo $result;
            }            
        }   
        

    }
}



?>