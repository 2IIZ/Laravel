<?php

namespace LGSB;

use Illuminate\Database\Eloquent\Model;

class Practicien extends Model
{
  protected $fillable = [
      'name', 'mail', 'telephone', 'notoriete',
      'specialite', 'diplome', 'coefficien_prescription',
      'ville_origine', 'ville', 'adresse', 'date_embauche',
  ];
}
