<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->setPrimaryTable(array(
   'name' => 'f_cd',
   'uniqueConstraints' => 
   array(
   'cd' => 
   array(
    'columns' => 
    array(
    0 => 'cd',
    ),
   ),
   ),
   'indexes' => 
   array(
   'artiste' => 
   array(
    'columns' => 
    array(
    0 => 'artiste',
    ),
   ),
   'genre' => 
   array(
    'columns' => 
    array(
    0 => 'genre',
    ),
   ),
   'support' => 
   array(
    'columns' => 
    array(
    0 => 'support',
    ),
   ),
   'type' => 
   array(
    'columns' => 
    array(
    0 => 'type',
    ),
   ),
   'airplay' => 
   array(
    'columns' => 
    array(
    0 => 'cd',
    1 => 'airplay',
    ),
   ),
   'dprogra' => 
   array(
    'columns' => 
    array(
    0 => 'dprogra',
    ),
   ),
   'jsaisie' => 
   array(
    'columns' => 
    array(
    0 => 'jsaisie',
    ),
   ),
   'alllabel' => 
   array(
    'columns' => 
    array(
    0 => 'label',
    1 => 'maison',
    2 => 'distrib',
    ),
   ),
   'jsaisie_anne' => 
   array(
    'columns' => 
    array(
    0 => 'jsaisie',
    1 => 'annee',
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
   'fieldName' => 'cd',
   'columnName' => 'cd',
   'type' => 'integer',
   'nullable' => false,
   'unsigned' => true,
   'comment' => '',
   'default' => '0',
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
   'fieldName' => 'titre',
   'columnName' => 'titre',
   'type' => 'string',
   'nullable' => false,
   'length' => 250,
   'fixed' => true,
   'comment' => '',
   'default' => '',
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
   'fieldName' => 'maison',
   'columnName' => 'maison',
   'type' => 'integer',
   'nullable' => false,
   'unsigned' => true,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'distrib',
   'columnName' => 'distrib',
   'type' => 'integer',
   'nullable' => false,
   'unsigned' => true,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'dsortie',
   'columnName' => 'dsortie',
   'type' => 'datetime',
   'nullable' => false,
   'comment' => '',
   'default' => '0000-00-00 00:00:00',
  ));
$metadata->mapField(array(
   'fieldName' => 'annee',
   'columnName' => 'annee',
   'type' => 'string',
   'nullable' => false,
   'length' => 4,
   'fixed' => true,
   'comment' => '',
   'default' => '',
  ));
$metadata->mapField(array(
   'fieldName' => 'type',
   'columnName' => 'type',
   'type' => 'integer',
   'nullable' => false,
   'unsigned' => true,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'support',
   'columnName' => 'support',
   'type' => 'integer',
   'nullable' => false,
   'unsigned' => true,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'genre',
   'columnName' => 'genre',
   'type' => 'integer',
   'nullable' => false,
   'unsigned' => true,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'langue',
   'columnName' => 'langue',
   'type' => 'integer',
   'nullable' => false,
   'unsigned' => true,
   'comment' => '',
   'default' => '0',
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
   'fieldName' => 'userProgra',
   'columnName' => 'user_progra',
   'type' => 'integer',
   'nullable' => false,
   'unsigned' => true,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'dprogra',
   'columnName' => 'dprogra',
   'type' => 'integer',
   'nullable' => false,
   'unsigned' => true,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'comment',
   'columnName' => 'comment',
   'type' => 'text',
   'nullable' => false,
   'length' => NULL,
   'fixed' => false,
   'comment' => '',
  ));
$metadata->mapField(array(
   'fieldName' => 'dsaisie',
   'columnName' => 'dsaisie',
   'type' => 'datetime',
   'nullable' => false,
   'comment' => '',
   'default' => '0000-00-00 00:00:00',
  ));
$metadata->mapField(array(
   'fieldName' => 'jsaisie',
   'columnName' => 'jsaisie',
   'type' => 'integer',
   'nullable' => false,
   'unsigned' => true,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'dvd',
   'columnName' => 'dvd',
   'type' => 'boolean',
   'nullable' => false,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'noteMoy',
   'columnName' => 'note_moy',
   'type' => 'float',
   'nullable' => false,
   'precision' => 5,
   'scale' => 2,
   'comment' => '',
   'default' => '0.00',
  ));
$metadata->mapField(array(
   'fieldName' => 'airplay',
   'columnName' => 'airplay',
   'type' => 'boolean',
   'nullable' => false,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'retourMail',
   'columnName' => 'retour_mail',
   'type' => 'string',
   'nullable' => false,
   'length' => 100,
   'fixed' => false,
   'comment' => '',
   'default' => '',
  ));
$metadata->mapField(array(
   'fieldName' => 'retourLabel',
   'columnName' => 'retour_label',
   'type' => 'boolean',
   'nullable' => false,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'retourComment',
   'columnName' => 'retour_comment',
   'type' => 'text',
   'nullable' => false,
   'length' => NULL,
   'fixed' => false,
   'comment' => '',
  ));
$metadata->mapField(array(
   'fieldName' => 'various',
   'columnName' => 'various',
   'type' => 'boolean',
   'nullable' => false,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'nbPiste',
   'columnName' => 'nb_piste',
   'type' => 'integer',
   'nullable' => false,
   'unsigned' => true,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'paulo',
   'columnName' => 'paulo',
   'type' => 'boolean',
   'nullable' => false,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'etiquette',
   'columnName' => 'etiquette',
   'type' => 'boolean',
   'nullable' => false,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'libartiste',
   'columnName' => 'libartiste',
   'type' => 'string',
   'nullable' => false,
   'length' => 100,
   'fixed' => true,
   'comment' => '',
   'default' => '',
  ));
$metadata->mapField(array(
   'fieldName' => 'libelle',
   'columnName' => 'libelle',
   'type' => 'string',
   'nullable' => false,
   'length' => 250,
   'fixed' => true,
   'comment' => '',
   'default' => '',
  ));
$metadata->mapField(array(
   'fieldName' => 'discid',
   'columnName' => 'discid',
   'type' => 'string',
   'nullable' => false,
   'length' => 10,
   'fixed' => true,
   'comment' => '',
   'default' => '',
  ));
$metadata->mapField(array(
   'fieldName' => 'refLabel',
   'columnName' => 'ref_label',
   'type' => 'string',
   'nullable' => false,
   'length' => 45,
   'fixed' => true,
   'comment' => '',
   'default' => '',
  ));
$metadata->mapField(array(
   'fieldName' => 'suppr',
   'columnName' => 'suppr',
   'type' => 'boolean',
   'nullable' => false,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'retourAttendu',
   'columnName' => 'retour_attendu',
   'type' => 'integer',
   'nullable' => false,
   'unsigned' => true,
   'comment' => '',
   'default' => '0',
  ));
$metadata->mapField(array(
   'fieldName' => 'img',
   'columnName' => 'img',
   'type' => 'string',
   'nullable' => false,
   'length' => 15,
   'fixed' => false,
   'comment' => '',
   'default' => '',
  ));
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_IDENTITY);