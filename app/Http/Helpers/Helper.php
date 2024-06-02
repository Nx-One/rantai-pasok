<?php
namespace App\Http\Helpers;
use App\Http\Helpers\Constant;

class Helper{
    public static function getEOQ($store_cost, $order_cost, $durian_received, $price, $demand){
        $H = ($store_cost + $order_cost) / $durian_received;
        $S = $price;
        $D = $demand;
        return sqrt((2 * $D * $S) / $H);
    }


    // performances
    public static function countOrderShipped($orders_shipped, $target_orders_shipped){
        return (($orders_shipped / $target_orders_shipped) * 100) * Constant::WEIGHT_PERF_VAL['orders_shipped'];
    }
    public static function countRequestsFulfilled($requests_fulfilled, $target_requests_fulfilled){
        return (($requests_fulfilled / $target_requests_fulfilled) * 100) * Constant::WEIGHT_PERF_VAL['requests_fulfilled'];
    }
    public static function countNumberOfShipments($number_of_shipments, $target_number_of_shipments){
        return (($number_of_shipments / $target_number_of_shipments) * 100) * Constant::WEIGHT_PERF_VAL['number_of_shipments'];
    }
    public static function countLeadTime($lead_time, $target_lead_time){
        return (($target_lead_time / $lead_time ) * 100) * Constant::WEIGHT_PERF_VAL['lead_time'];
    }
    public static function countOrderCycles($order_cycles, $target_order_cycles){
        return (($target_order_cycles / $order_cycles ) * 100) * Constant::WEIGHT_PERF_VAL['order_cycles'];
    }
    public static function countFlexibility($flexibility, $target_flexibility){
        return (($target_flexibility / $flexibility ) * 100) * Constant::WEIGHT_PERF_VAL['flexibility'];
    }
    public static function countSupplyChainCosts($supply_chain_costs, $target_supply_chain_costs){
        return (($target_supply_chain_costs / $supply_chain_costs ) * 100) * Constant::WEIGHT_PERF_VAL['supply_chain_costs'];
    }
    public static function countCogs($cogs, $target_cogs){
        return (($target_cogs / $cogs ) * 100) * Constant::WEIGHT_PERF_VAL['cogs'];
    }
    public static function countPaybackCycle($payback_cycle, $target_payback_cycle){
        return (($target_payback_cycle / $payback_cycle ) * 100) * Constant::WEIGHT_PERF_VAL['payback_cycle'];
    }
    public static function sumAll($orders_shipped, $fullFiled, $shipments, $leadTime, $orderCycles, $flexibility, $supplyChainCosts, $cogs, $paybackCycle){
        return $orders_shipped + $fullFiled + $shipments + $leadTime + $orderCycles + $flexibility + $supplyChainCosts + $cogs + $paybackCycle;
        
    }

    public static function getStatusPerformance($total){
        if ($total < 40) {
            return 'Poor';
        } elseif ($total >= 40 && $total <= 50) {
            return 'Marginal';
        } elseif ($total > 50 && $total <= 70) {
            return 'Average';
        } elseif ($total > 70 && $total <= 90) {
            return 'Good';
        } else {
            return 'Excellent';
        }
    }

    // mitigation risk
    public static function countMitigationRisk1($occurrence, $severities, $connection_values){
        $result = 0;

        if (count($severities) == count($connection_values)) {
            for ($i = 0; $i < count($severities); $i++) {
                $result += $severities[$i] * $connection_values[$i];
            }
        } else {
            // Handle error
            throw new Exception('The lengths of severities and connection_values must be the same');
        }

        return $occurrence * $result;

    }

    public static function countMitigationRisk2($degree, $arp, $connection_values){
        $result = 0;

        if (count($arp) == count($connection_values)) {
            for ($i = 0; $i < count($arp); $i++) {
                $result += $arp[$i] * $connection_values[$i];
            }
        } else {
            // Handle error
            throw new Exception('The lengths of severities and connection_values must be the same');
        }

        return $degree * $result;

    }

    public static function sumMitigationRiskPercentage($mitigationResult, $sumMitigationRisk){
        return ($mitigationResult / $sumMitigationRisk) * 100;
    }

}