<?php

namespace App\Repository;

abstract class AbstractRepository implements RepositoryInterface
{

    /**
     * @var
     */
    protected $model;
    protected $with = [];

    /**
     * @param array $columns
     * @return mixed
     */
    public function all($columns = ['*'])
    {
        return $this->model->all();
    }


    /**
     * @param $attribute
     * @param $value
     * @param string $operator
     * @return mixed
     */
    public function where($attribute, $operator = '=', $value)
    {
        return $this->model->where($attribute, $operator, $value);
    }

    /**
     * @param int $perPage
     * @param array $columns
     * @return mixed
     */
    public function paginate($perPage = 15, $columns = ['*'])
    {
        if (count($this->with) > 0) {
            $this->newQuery()->eagerLoadRelations();
        }

        return $this->model->paginate($perPage, $columns);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @param array $data
     * @param $id
     * @param string $attribute
     * @return mixed
     */
    public function update(array $data, $id, $attribute = "id")
    {
        return $this->model->where($attribute, '=', $id)->update($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = ['*'])
    {
        if (count($this->with) > 0) {
            $this->newQuery()->eagerLoadRelations();
        }

        return $this->model->find($id, $columns);
    }


    /**
     * @param $attribute
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findBy($attribute, $value, $columns = ['*'])
    {
        if (count($this->with) > 0) {
            $this->newQuery()->eagerLoadRelations();
        }

        return $this->model->where($attribute, '=', $value)->first($columns);
    }

    protected function eagerLoadRelations()
    {
        if (!is_null($this->with)) {
            foreach ($this->with as $relation) {
                $this->model->with($relation);
            }

//$this->model->with(implode(',',$this->with));
        }

        return $this;
    }

    /**
     * @return $this
     */
    public function newQuery()
    {
        $this->model = $this->model->newQuery();

        return $this;
    }


    /**
     * @param $relations
     * @return $this
     */
    public function with($relations)
    {
        if (is_string($relations)) {
            $relations = func_get_args();
        }

        array_push($this->with, $relations);

        return $this;
    }

    /**
     * @return mixed
     */
    public function onlyTrashed()
    {
        return $this->model->onlyTrashed();
    }

    /**
     * @return mixed
     */
    public function withTrashed()
    {
        return $this->model->withTrashed();
    }


    /**
     * @return mixed
     */
    public function count()
    {
        return $this->model->count();
    }

    /**
     * @return mixed
     */
    public function restore()
    {
        return $this->model->restore();
    }

    /**
     * @param $column
     * @param string $key_column
     * @return mixed
     */
    public function orderBy($column, $key_column = '')
    {
        return $this->model->orderBy($column, $key_column);
    }


    /**
     * @param $limit
     * @return mixed
     */
    public function limit($limit)
    {
        return $this->model->take($limit);
    }
}