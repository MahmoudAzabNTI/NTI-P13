<?php
namespace App\Http\Traits;
trait ResponseTrait{
  public function successResponse($data, $key, string $message, int $code)
  {
    # code...
    return response()->json([
      'status' => true,
      'errors' => (object)[],
      'data' => (object)[],
      'key' => $key,
      'message' => $message
    ],$code);
  }
  public function errorResponse(Array $errors, string $message, int $code)
  {
    # code...
    return response()->json([
      'status' => false,
      'errors' => $errors,
      'data' => (object)[],
      'message' => $message,
    ],$code);
  }
  public function dataResponse(Array $data, string $message, int $code)
  {
    # code...
    return response()->json([
      'status' => true,
      'errors' => (object)[],
      'data' => $data,
    ],$code);
  }
}
?>