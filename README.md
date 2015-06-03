# rollandgarros

Call this PHP script to see live, complete or upcoming Roland Garros 2015 results in command line

## Requirements
* PHP
* Curl

## Usage
```php rgr.php [l][c][u]```

* no parameters=live only
* l=live results
* c=completed matches results
* u=upcoming matches

## Example
```
> php rgr.php l

LIVE:
Philippe-Chatrier - Men's Singles - Quarterfinals - Day 16
N.Djokovic (SRB) 4
R.Nadal (ESP) 3

Suzanne-Lenglen - Men's Singles - Quarterfinals - Day 16
A.Murray (GBR) 1
D.Ferrer (ESP) 0

Court 1 - Women's Doubles - Quarterfinals - Day 16
Sw.Hsieh (TPE) / F.Pennetta (ITA) 5 6 4
A.Hlavackova (CZE) / L.Hradecka (CZE) 7 3 4

Court 8 - Girls'Doubles - Round 2 - Day 16
Um.Arconada (USA) / N.Podoroska (ARG) 1
Bv.Andreescu (CAN) / O.Pervushina (RUS) 2

Court 10 - Boys'Doubles - Round 2 - Day 16
F.Capalbo (ARG) / G.Espin Busleiman (ARG) 0
V.Durasovic (NOR) / P.Niklas-Salminen (FIN) 0

Court 14 - Girls'Singles - Round 3 - Day 16
K.Stewart (USA) 6 5 2
A.Blinkova (RUS) 1 7 0
```
