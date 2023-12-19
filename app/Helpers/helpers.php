<?php

if (!function_exists("responses")) {
    function responses($statusCode = 200, $data = null, $message = null)
    {
        switch ($statusCode) {
            case 200:
                return response()->json(["data" => [
                    "message" => $message ?? "Request Successful",
                    "code" => 200,
                    "data" => $data,
                ]], $statusCode);
            case 201:
                return response()->json(["data" => [
                    "message" => $message ?? "Request Successful - Data Successfully Created",
                    "code" => 201,
                    "data" => $data,
                ]], $statusCode);

            case 204:
                return response()->json(["data" => [
                    "message" => $message ?? "No Content",
                    "code" => 204,
                    "data" => $data,
                ]], $statusCode);
            case 400:
                return response()->json(["error" => [
                    "message" => $message ?? "Bad Request - Invalid input provided",
                    "code" => 400,
                ]], $statusCode);
            case 401:
                return response()->json(["error" => [
                    "message" => $message ?? "Unauthorized - Authentication is required",
                    "code" => 401,
                ]], $statusCode);
            case 403:
                return response()->json(["error" => [
                    "message" => $message ?? "Forbidden - You do not have permission to access this resource",
                    "code" => 403,
                ]], $statusCode);
            case 404:
                return response()->json(["error" => [
                    "message" => $message ?? "Not Found - The requested resource was not found",
                    "code" => 404,
                ]], $statusCode);
            default:
                return response()->json(["error" => [
                    "message" => $message ?? "Internal Server Error - Something went wrong on the server",
                    "code" => 500,
                ]], $statusCode);
        }
    }
}
