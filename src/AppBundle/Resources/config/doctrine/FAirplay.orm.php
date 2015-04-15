<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->setPrimaryTable(array(
   'name' => 'f_airplay',
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
   'fieldName' => 'airplay',
   'columnName' => 'airplay',
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
   'length' => 200,
   'fixed' => false,
   'comment' => '',
   'default' => '',
  ));
$metadata->mapField(array(
   'fieldName' => 'dcreat',
   'columnName' => 'dcreat',
   'type' => 'datetime',
   'nullable' => false,
   'comment' => '',
   'default' => '0000-00-00 00:00:00',
  ));
$metadata->mapField(array(
   'fieldName' => 'annee',
   'columnName' => 'annee',
   'type' => 'integer',
   'nullable' => false,
   'unsigned' => true,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'mois',
   'columnName' => 'mois',
   'type' => 'integer',
   'nullable' => false,
   'unsigned' => true,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'dmodif',
   'columnName' => 'dmodif',
   'type' => 'datetime',
   'nullable' => false,
   'comment' => '',
   'default' => '0000-00-00 00:00:00',
  ));
$metadata->mapField(array(
   'fieldName' => 'cUser',
   'columnName' => 'c_user',
   'type' => 'integer',
   'nullable' => false,
   'unsigned' => true,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'mUser',
   'columnName' => 'm_user',
   'type' => 'integer',
   'nullable' => false,
   'unsigned' => true,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'publie',
   'columnName' => 'publie',
   'type' => 'boolean',
   'nullable' => false,
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
   'fieldName' => 'courant',
   'columnName' => 'courant',
   'type' => 'boolean',
   'nullable' => false,
   'comment' => '',
   'default' => '0',
  ));
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_IDENTITY);