<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->setPrimaryTable(array(
   'name' => 'f_retour_label',
   'indexes' => 
   array(
   'cdlabel' => 
   array(
    'columns' => 
    array(
    0 => 'cd',
    1 => 'label',
    ),
   ),
   'label' => 
   array(
    'columns' => 
    array(
    0 => 'label',
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
   'fieldName' => 'typeRetour',
   'columnName' => 'type_retour',
   'type' => 'string',
   'nullable' => false,
   'length' => NULL,
   'fixed' => false,
   'comment' => '',
   'default' => 'RETOUR',
  ));
$metadata->mapField(array(
   'fieldName' => 'cd',
   'columnName' => 'cd',
   'type' => 'integer',
   'nullable' => false,
   'unsigned' => true,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'label',
   'columnName' => 'label',
   'type' => 'integer',
   'nullable' => false,
   'unsigned' => true,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'user',
   'columnName' => 'user',
   'type' => 'integer',
   'nullable' => false,
   'unsigned' => true,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'chrono',
   'columnName' => 'chrono',
   'type' => 'datetime',
   'nullable' => false,
   'comment' => '',
   'default' => '0000-00-00 00:00:00',
  ));
$metadata->mapField(array(
   'fieldName' => 'mail',
   'columnName' => 'mail',
   'type' => 'string',
   'nullable' => false,
   'length' => 100,
   'fixed' => false,
   'comment' => '',
   'default' => '',
  ));
$metadata->mapField(array(
   'fieldName' => 'contMail',
   'columnName' => 'cont_mail',
   'type' => 'string',
   'nullable' => false,
   'length' => 250,
   'fixed' => false,
   'comment' => '',
   'default' => '',
  ));
$metadata->mapField(array(
   'fieldName' => 'objetMail',
   'columnName' => 'objet_mail',
   'type' => 'string',
   'nullable' => false,
   'length' => 150,
   'fixed' => false,
   'comment' => '',
   'default' => '',
  ));
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_IDENTITY);