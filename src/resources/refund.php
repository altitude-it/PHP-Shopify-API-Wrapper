<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Operations
    |--------------------------------------------------------------------------
    |
    | This array of operations is translated into methods that complete these
    | requests based on their configuration.
    |
    */

    "operations" => array(

        /**
         *    getRefunds() method
         *
         *    reference: http://docs.shopify.com/api/refund
         */
        "getRefunds" => array(
            "httpMethod" => "GET",
            "uri" => "/admin/orders/{order_id}/refunds.json",
            "summary" => "Receive a list of refunds for an order.",
            "responseModel" => "defaultJsonResponse",
            "parameters" => array(
                "order_id" => array(
                    "type" => "number",
                    "location" => "uri",
                    "description" => "The ID of the order.",
                    "required" => true
                ),
                "fields" => array(
                    "type" => "number",
                    "location" => "query",
                    "description" => "Comma-separated list of fields to include in the response."
                )
            )
        ),

        /**
         *    getRefund() method
         *
         *    reference: http://docs.shopify.com/api/refund
         */
        "getRefund" => array(
            "httpMethod" => "GET",
            "uri" => "/admin/orders/{order_id}/refunds/{id}.json",
            "summary" => "Receive a singe refund.",
            "responseModel" => "defaultJsonResponse",
            "parameters" => array(
                "id" => array(
                    "type" => "number",
                    "location" => "uri",
                    "description" => "The ID of the refund.",
                    "required" => true
                ),
                "order_id" => array(
                    "type" => "number",
                    "location" => "uri",
                    "description" => "The ID of the order.",
                    "required" => true
                ),
                "fields" => array(
                    "type" => "number",
                    "location" => "query",
                    "description" => "Comma-separated list of fields to include in the response."
                )
            )
        ),
        "calculateRefund" => array(
            "httpMethod" => "POST",
            "uri" => "/admin/orders/{order_id}/refunds/calculate.json",
            "summary" => "Calculate a refund.",
            "responseModel" => "defaultJsonResponse",
            "parameters" => array(
                "order_id" => array(
                    "type" => "number",
                    "location" => "uri",
                    "description" => "The ID of the order.",
                    "required" => true
                ),
                "refund" => array(
                    "location" => "json",
                    "parameters" => array(
                        "shipping" => array(
                            "location" => "json",
                            "parameters" => array(
                                "full_refund" => array(
                                    "type" => "boolean",
                                    "location" => "json",
                                    "description" => "set to true to refund all remaining shipping."
                                ),
                                "amount" => array(
                                    "type" => "number",
                                    "location" => "json",
                                    "description" => "Set specific amount of shipping to refund. Takes precedence over full_refund."
                                ),
                            ),
                        ),
                        "refund_line_items" => array(
                            "type" => "string",
                            "location" => "json",
                            "description" => "Array of line item IDs and quantities to refund"
                        )
                    ),
                ),
            ),
        ),
    ),

    /*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    |
    | This array of models is specifications to returning the response
    | from the operation methods.
    |
    */

    "models" => array(

    ),
);