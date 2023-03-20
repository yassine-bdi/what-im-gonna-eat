<?php

namespace App\Models;

class Meal extends Model
{

   protected $table = 'meals';

   public function create(array $data, ?array $relations = null)
   {
      parent::create($data);
   }

   public function all(): array
   {
      $meals =  parent::all();
      return $meals;
   }

   public function update(int $id, array $data, ?array $relations = null): void
   {
      parent::update($id, $data);
   }

   public function findById(int $id): Model
   {
      return parent::findById($id);
   }

   public function destroy(int $id): bool
   {
      return parent::destroy($id);
   }

   public function Count()
   {
      return parent::Count();
   }

   public function decide($data)
   {
      if ($data['supp'] == 'no' && $data['meal'] == 'launch') {
         return  $this->query("SELECT * FROM {$this->table} WHERE type='principal' AND meal='launch' ORDER BY RAND() LIMIT 1");
      } elseif ($data['supp'] == 'yes' && $data['meal'] == 'launch') {

         return  $this->query("SELECT * FROM {$this->table} WHERE type='supp' AND meal='launch' ORDER BY RAND() LIMIT 1");
      } elseif ($data['supp'] == 'no' && $data['meal'] == 'dinner') {

         return  $this->query("SELECT * FROM {$this->table} WHERE type='principal' AND meal='dinner' ORDER BY RAND() LIMIT 1");
      } elseif ($data['supp'] == 'yes' && $data['meal'] == 'dinner') {

         return  $this->query("SELECT * FROM {$this->table} WHERE type='supp' AND meal='dinner' ORDER BY RAND() LIMIT 1");
      }
   }
}
