# Simple Calculator

```php
$simpleCalculatorController = $client->getSimpleCalculatorController();
```

## Class Name

`SimpleCalculatorController`

## Methods

* [Get Calculate](../../doc/controllers/simple-calculator.md#get-calculate)
* [Get Deprecated Calculate](../../doc/controllers/simple-calculator.md#get-deprecated-calculate)


# Get Calculate

Calculates the expression using the specified operation.

```php
function getCalculate(array $options): float
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `operation` | [`string (OperationTypeEnum)`](../../doc/models/operation-type-enum.md) | Template, Required | The operator to apply on the variables |
| `x` | `float` | Query, Required | The LHS value |
| `y` | `float` | Query, Required | The RHS value |

## Response Type

`float`

## Example Usage

```php
$collect = [];

$operation = Models\OperationTypeEnum::MULTIPLY;
$collect['operation'] = $operation;

$x = 222.14;
$collect['x'] = $x;

$y = 165.14;
$collect['y'] = $y;

$result = $simpleCalculatorController->getCalculate($collect);
```

## Errors

| HTTP Status Code | Error Description | Exception Class |
|  --- | --- | --- |
| 412 | Could not compute the requested calculation | [`CouldNotComputeException`](../../doc/models/could-not-compute-exception.md) |


# Get Deprecated Calculate

**This endpoint is deprecated since version 1.0.0. Hello this is a long comment that should be wrapped properly by CodeUtilities.WrapString()**

Calculates the expression using the specified operation.

```php
function getDeprecatedCalculate(array $options): float
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `operation` | [`string (OperationTypeEnum)`](../../doc/models/operation-type-enum.md) | Template, Required | The operator to apply on the variables |
| `x` | `float` | Query, Required | The LHS value |
| `y` | `float` | Query, Required | The RHS value |

## Response Type

`float`

## Example Usage

```php
$collect = [];

$operation = Models\OperationTypeEnum::MULTIPLY;
$collect['operation'] = $operation;

$x = 222.14;
$collect['x'] = $x;

$y = 165.14;
$collect['y'] = $y;

$result = $simpleCalculatorController->getDeprecatedCalculate($collect);
```

## Errors

| HTTP Status Code | Error Description | Exception Class |
|  --- | --- | --- |
| 412 | Could not compute the requested calculation | [`CouldNotComputeException`](../../doc/models/could-not-compute-exception.md) |

