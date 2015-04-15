<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->setPrimaryTable(array(
   'name' => 'f_rotation',
   'indexes' => 
   array(
   'rotation' => 
   array(
    'columns' => 
    array(
    0 => 'rotation',
    ),
   ),
   'libelle' => 
   array(
    'columns' => 
    array(
    0 => 'libelle',
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
   'fieldName' => 'rotation',
   'columnName' => 'rotation',
   'type' => 'integer',
   'nullable' => false,
   'unsigned' => true,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'libelle',
   'columnName' => 'libelle',
   'type' => 'string',
   'nullable' => false,
   'length' => 45,
   'fixed' => false,
   'comment' => '',
   'default' => '',
  ));
$metadata->mapField(array(
   'fieldName' => 'ordre',
   'columnName' => 'ordre',
   'type' => 'integer',
   'nullable' => false,
   'unsigned' => true,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'airplay',
   'columnName' => 'airplay',
   'type' => 'boolean',
   'nullable' => false,
   'comment' => '',
   'default' => '1',
  ));
$metadata->mapField(array(
   'fieldName' => 'retourLabel',
   'columnName' => 'retour_label',
   'type' => 'string',
   'nullable' => false,
   'length' => 200,
   'fixed' => false,
   'comment' => '',
   'default' => '',
  ));
$metadata->mapField(array(
   'fieldName' => 'apu',
   'columnName' => 'apu',
   'type' => 'boolean',
   'nullable' => false,
   'comment' => '',
   'default' => '0',
  ));
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_IDENTITY);