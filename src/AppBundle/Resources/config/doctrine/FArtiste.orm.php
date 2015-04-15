<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->setPrimaryTable(array(
   'name' => 'f_artiste',
   'uniqueConstraints' => 
   array(
   'artiste' => 
   array(
    'columns' => 
    array(
    0 => 'artiste',
    ),
   ),
   ),
   'indexes' => 
   array(
   'libelle' => 
   array(
    'columns' => 
    array(
    0 => 'libelle',
    ),
   ),
   'nom' => 
   array(
    'columns' => 
    array(
    0 => 'nom',
    ),
   ),
   ),
  ));
$metadata->setChangeTrackingPolicy(ClassMetadataInfo::CHANGETRACKING_DEFERRED_IMPLICIT);
$metadata->mapField(array(
   'fieldName' => 'dbkey',
   'columnName' => 'dbkey',
   'type' => 'integer',
   'nullable' => false,
   'unsigned' => true,
   'comment' => '',
   'id' => true,
  ));
$metadata->mapField(array(
   'fieldName' => 'artiste',
   'columnName' => 'artiste',
   'type' => 'integer',
   'nullable' => false,
   'unsigned' => true,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'prenom',
   'columnName' => 'prenom',
   'type' => 'string',
   'nullable' => false,
   'length' => 50,
   'fixed' => false,
   'comment' => '',
   'default' => '',
  ));
$metadata->mapField(array(
   'fieldName' => 'nom',
   'columnName' => 'nom',
   'type' => 'string',
   'nullable' => false,
   'length' => 250,
   'fixed' => false,
   'comment' => '',
   'default' => '',
  ));
$metadata->mapField(array(
   'fieldName' => 'libelle',
   'columnName' => 'libelle',
   'type' => 'string',
   'nullable' => false,
   'length' => 300,
   'fixed' => false,
   'comment' => '',
   'default' => '',
  ));
$metadata->mapField(array(
   'fieldName' => 'siteweb',
   'columnName' => 'siteweb',
   'type' => 'string',
   'nullable' => false,
   'length' => 150,
   'fixed' => false,
   'comment' => '',
   'default' => '',
  ));
$metadata->mapField(array(
   'fieldName' => 'myspace',
   'columnName' => 'myspace',
   'type' => 'string',
   'nullable' => false,
   'length' => 150,
   'fixed' => false,
   'comment' => '',
   'default' => '',
  ));
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_IDENTITY);