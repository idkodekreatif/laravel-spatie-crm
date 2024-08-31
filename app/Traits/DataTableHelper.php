<?php

namespace App\Traits;

trait DataTableHelper
{
    public function basicActions($row)
    {
        $actions = [];

        // Generate the Detail action link
        $actions['Detail'] = route(str_replace('/', '.', request()->path()) . '.show', $row->id);

        // Check if the user has permission to update and generate the Edit action link
        if (user()->can('update ' . request()->path())) {
            $actions['Edit'] = route(str_replace('/', '.', request()->path()) . '.edit', $row->id);
        }

        // Check if the user has permission to delete and generate the Delete action link
        if (user()->can('delete ' . request()->path())) {
            $actions['Delete'] = route(str_replace('/', '.', request()->path()) . '.destroy', $row->id);
        }

        return $actions;
    }
}
