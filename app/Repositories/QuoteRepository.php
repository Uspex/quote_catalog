<?php

namespace App\Repositories;

use App\Models\Quote as Model;

/**
 *  Class QuoteRepository
 *
 * @package App\Repositories
 *
 */
class QuoteRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     *  Детальная информация
     *
     * @param int$id
     * @return Model
     */
    public function getEdit($id)
    {
        $columns = ['*'];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->find($id);

        return $result;
    }

    /**
     * Пагинация
     *
     * @param int|null $perPage
     * @param array $filter
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginate($perPage, $filter = [])
    {
        $columns = ['*'];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->when(isset($filter['editor_id']), function ($query) use($filter)  {
                $query->where('editor_id', $filter['editor_id']);
            })
            ->when(isset($filter['delete_show']), function ($query) use($filter)  {
                $query->withTrashed();
            })
            ->withCount('share')
            ->orderBy('id', 'DESC')
            ->paginate($perPage);

        return $result;
    }

}
