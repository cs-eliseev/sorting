<?php

namespace sort;

class MergeSorting
{
    /**
     * @param array $data
     * @return array
     */
    public function sorting(array $data): array
    {
        $count = count($data);
        if ($count <= 1) return $data;

        $left  = array_slice($data, 0, (int) ($count/2));
        $left = $this->sorting($left);

        $right = array_slice($data, (int) ($count/2));
        $right = $this->sorting($right);

        unset($count);

        return $this->merge($left, $right);
    }

    /**
     * @param array $left
     * @param array $right
     * @return array
     */
    protected function merge(array $left, array $right): array
    {
        $ret = [];
        while (count($left) > 0 && count($right) > 0) {
            if ($left[0] < $right[0]) {
                array_push($ret, array_shift($left));
            } else {
                array_push($ret, array_shift($right));
            }
        }

        array_splice($ret, count($ret), 0, $left);
        array_splice($ret, count($ret), 0, $right);

        return $ret;
    }
}

$test = new MergeSorting();
print_r($test->sorting([1, 88, 5, 77, 99, 98, 97, 55, 56, 52, 59, 37]));