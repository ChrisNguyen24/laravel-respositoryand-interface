<?php 

namespace App\Repositories\Tasks;

interface TaskInterface
{
	function getAll();
 
	function getById($id);
 
	function create(array $attributes);
 
	function update($id, array $attributes);
 
	function delete($id);
}