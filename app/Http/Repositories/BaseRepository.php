<?php

namespace App\Http\Repositories;
use App\Http\Repositories\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel(): void
    {
        $this->model = app()->make($this->getModel());
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getPaginate(array $params): LengthAwarePaginator
    {
        $query = $this->model->query();
        if (isset($params['keyword'])) {
            $query->where('name', 'like', '%' . $params['keyword'] . '%');
        }
        if (isset($params['trashed'])) {
            $query->onlyTrashed();
        }
        return $query->paginate();
    }

    public function code()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(1000, 9999)
            . mt_rand(1000, 9999)
            . $characters[rand(0, strlen($characters) - 1)];
        $string = str_shuffle($pin);
        $check = $this->model->where('code', '=', $string)->first();
        if(!$check){
            return $string;
        }else{
            return null;
        }
    }

    public function findOrFail(int $id): Model
    {
        return $this->model->findOrFail($id);
    }


    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    public function update(int $id, array $attributes): Model
    {
        $model = $this->model->find($id);
        $model->update($attributes);
        return $model;
    }

    public function delete(int|array $id): int
    {
        return $this->model->delete($id);
    }

    public function destroy(int|array $id): int
    {
        return $this->model->destroy($id);
    }

    public function restore(int|array $id): bool
    {
        return $this->model->onlyTrashed()->whereIn('id', is_array($id) ? $id : [$id])->restore();
    }

    public function getAllWithRelations($relations  = []): Collection
    {
        return $this->model->with($relations)->get();
    }

    public function getWithRelationId($id, $relations  = []): Collection
    {
        return $this->model->with($relations)->find($id);
    }

    public function createWithRelations(array $data, array $relations = []): Model
    {
        // Extract related data from the main data array
        $relatedData = [];
        foreach ($relations as $relation) {
            if (isset($data[$relation])) {
                $relatedData[$relation] = $data[$relation];
                unset($data[$relation]);
            }
        }

        // Create the main model
        $model = $this->model->create($data);

        // Attach related models if there are any
        foreach ($relatedData as $relation => $items) {
            $model->$relation()->attach($items);
        }

        return $model->load($relations); // Load the relations to return the full object with relationships
    }


    public function updateWithRelations($id, array $data, array $relations = []): Model
    {
        // Tìm model chính
        $model = $this->model->findOrFail($id);

        // Trích xuất dữ liệu liên quan từ mảng dữ liệu chính
        $relatedData = [];
        foreach ($relations as $relation) {
            if (isset($data[$relation])) {
                $relatedData[$relation] = $data[$relation];
                unset($data[$relation]);
            }
        }

        // Cập nhật model chính
        $model->update($data);

        // Cập nhật các model liên quan nếu có
        foreach ($relatedData as $relation => $items) {
            // Đảm bảo phương thức liên quan được định nghĩa
            if (method_exists($model, $relation)) {
                // Lấy tất cả các bản ghi liên quan hiện tại và xóa chúng
                $model->$relation()->delete();

                // Tạo các bản ghi liên quan mới
                $model->$relation()->createMany($items);
            }
        }

        return $model->load($relations);
    }

}
