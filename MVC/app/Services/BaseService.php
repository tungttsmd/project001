<?php
trait BaseService
{
    public static function make(): self
    {
        return new self();
    }
    public function success($result, string $message = 'successful API (default message)', array $merge_result = [])
    {
        return [
            'data' => array_merge([
                'status' => 'success',
                'message' => $message,
                'result' => $result
            ], $merge_result),
        ];
    }
    public function error($error_code, string $message = 'error API (default message)', array $merge_extension = [])
    {
        return [
            'error' => [
                'message' => $message,
                'path' => __FUNCTION__,
                'extensions' => array_merge([
                    'code' => $error_code
                ], $merge_extension)
            ],
        ];
    }
}
