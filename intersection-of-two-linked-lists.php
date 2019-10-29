<?php

class Solution
{

    /**
     * @param Integer $intersectVal
     * @param ListNode $listA
     * @param ListNode $listB
     * @param Integer $skipA
     * @param Integer $skipB
     * @return ListNode
     */
    public function getIntersectionNode($intersectVal, $listA, $listB, $skipA, $skipB)
    {
        $pA = $listA;
        $pB = $listB;

        while ($pA !== $pB) {
            $pA = $pA !== null ? $pA->next : $listB;
            $pB = $pB !== null ? $pB->next : $listA;
        }

        return $pA;
    }
}
