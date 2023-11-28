# API Tech Request
- Project: Forest Grow Area Calculator
- Updated: 2023.11.28, zl

## Abstract
Primary goal is to get the area value for given cadastre number (`Zemes vienības kadastra apzīmējums`).

Requested area should be calculated as the area of the `Zemes vienība` shape minus the area of intersections with the specified shape layers.

Secondary goal is to obtain an image of a map of the specified area with all intersecting layers.

## Specified layers list

- DAP Invazīvo sugu izplatība
  - https://data.gov.lv/dati/lv/dataset/invazivo-sugu-izplatiba-latvija
- DAP Mikroliegumi
  - https://data.gov.lv/dati/lv/dataset/mikroliegumi
- DAP Aizsargājamie koki
  - https://data.gov.lv/dati/lv/dataset/aizsargajamie-koki
- DAP Dabas pieminekļi
  - https://data.gov.lv/dati/lv/dataset/dabas-pieminekli

- DAP Aizsargājamas dzīvotnes – biotopi
  - https://data.gov.lv/dati/lv/dataset/aizsargajamas-dzivotnes-biotopi

- DAP Aizsargājamo sugu atradnes
  - https://data.gov.lv/dati/lv/dataset/aizsargajamo-sugu-atradnes
