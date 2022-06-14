
# Could Not Compute Exception

Is thrown when invalid input is given such as div by zero

## Structure

`CouldNotComputeException`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `serverMessage` | `string` | Required | Represents the server's exception message | getServerMessage(): string | setServerMessage(string serverMessage): void |
| `serverCode` | `int` | Required | Represents the server's error code | getServerCode(): int | setServerCode(int serverCode): void |

## Example (as JSON)

```json
{
  "ServerMessage": "ServerMessage6",
  "ServerCode": 170
}
```

