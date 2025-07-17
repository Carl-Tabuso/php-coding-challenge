## Basic cli program in php

### Mechanics

Develop a PHP command-line application that processes the logs.txt file. The program should extract and output specific data from the file according to the following specifications:

```
<ID>
Position: 1
Length: 12

<UserID>
Position: 13
Length: 6

<BytesTX>
Position: 19
Length: 8

<BytesRX>
Position: 27
Length: 8

<DateTime>
Position: 35
Length: 17
```

Conditions:

- Whitespaces should be removed from the field values
- BytesTX and BytesRX fields must be formatted with commas as thousand separators
- DateTime field should be in the following format: Tue, 04 March 2025 00:00:00

The program must create an output.txt file and contain the following details:

1. A pipe delimited version of the log in the following format: <UserID>|<BytesTX|<BytesRX|<DateTime>|<ID>
2. A list of IDs sorted in ascending order. Review the sorting properly. Below is an example of an improper sorting:

```
.
.
1000VM-B28F
1000WQ-H99P
1000XY-K42Z
100AS-V5X
100BT-T92V
.
.
```
3. A list of unique UserIDs sorted in ascending order with a result id enclosed in [ ] (Example: [1] <UserID>)

### How to run

- **Prereq** Installed php in local machine
- Execute the code by running
```php
php index.php
```
- You should get a file similar to [output.txt.](https://github.com/Carl-Tabuso/php-coding-challenge/blob/master/output.txt)
