# API Tech Request
- Project: Forest Grow Area Calculator
- Updated: 2023.11.28, zl

## Abstract
Primary goal is to get the area value for given cadastre number (`Zemes vienības kadastra apzīmējums`).

Requested area should be calculated as the area of the `Zemes vienība` shape minus the area of intersections with the specified shape layers.

Secondary goal is to obtain an image of a map of the specified area with all intersecting layers.

## Specified intersection layers

### Layer titles list
- DAP Invazīvo sugu izplatība
- DAP Mikroliegumi
- DAP Aizsargājamie koki
- DAP Dabas pieminekļi
- DAP Aizsargājamas dzīvotnes – biotopi
- DAP Aizsargājamo sugu atradnes
- LAD Lauksaimnieku deklarētās platības

### Layer details

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

- LAD Lauksaimnieku deklarētās platības
  - https://data.gov.lv/dati/lv/dataset/klientu-deklaretas-platibas-2022-gada
  - Nē, platība neder, ja LAD reģistrēti:
    ```
    Kvieši, vasaras Kvieši, ziemas Kvieši, vasaras, ar stiebrzāļu pasēju vai tauriņziežu pasēju Speltas kvieši, vasaras Speltas kvieši, ziemas Kvieši, ziemas, ar stiebrzāļu pasēju vai tauriņziežu pasēju Speltas kvieši, vasaras, ar stiebrzāļu pasēju vai tauriņziežu pasēju Speltas kvieši, ziemas, ar stiebrzāļu pasēju vai tauriņziežu pasēju Rudzi Rudzi, populācijas šķirnes, t. sk. ‘Kaupo’ Rudzi ar stiebrzāļu pasēju vai tauriņziežu pasēju Rudzi, populācijas šķirnes, t. sk. ‘Kaupo’, ar stiebrzāļu pasēju vai tauriņziežu pasēju Mieži, vasaras Mieži, ziemas Mieži, vasaras, ar stiebrzāļu vai tauriņziežu pasēju Mieži, ziemas, ar stiebrzāļu pasēju vai tauriņziežu pasēju Auzas Auzas ar stiebrzāļu vai tauriņziežu pasēju Tritikāle, vasaras Tritikāle, ziemas Tritikāle, vasaras, ar stiebrzāļu vai tauriņziežu pasēju Tritikāle, ziemas, ar stiebrzāļu pasēju vai tauriņziežu pasēju Griķi Griķi ar tauriņziežu pasēju Kaņepes Rapsis, vasaras Rapsis, ziemas Ripsis, vasaras Ripsis, ziemas Sinepe, tostarp baltā sinepe Sinepe ar tauriņziežu pasēju Lini, eļļas Lauka pupas Pupas ar stiebrzāļu pasēju vai tauriņziežu pasēju  Zirņi Zirņi ar stiebrzāļu pasēju vai tauriņziežu pasēju Lupīna (saldās jeb dzeltenās, baltās, šaurlapu) Vīķi, vasaras Vīķi, ziemas Soja Graudaugu un zirņu maisījums, kurā zirņi > 50 % Graudaugu un zirņu maisījums, kurā zirņi > 50 %, ar stiebrzāļu vai tauriņziežu pasēju Graudaugu un vīķu maisījums, kurā vīķi > 50 % Vīķi, vasaras, sēklas ieguvei Vīķi, ziemas, sēklas ieguvei Soja sēklas ieguvei Papuve, izņemot zaļmēslojuma augu papuvi  Zaļmēslojuma augu papuve Kokaugu stādaudzētavas lauksaimniecības zemē Miežabrālis Apse Kārkli Baltalksnis Ilggadīgie zālāji Citur neminētas stiebrzāles Esparsete Facēlija Facēlija ar tauriņziežu pasēju Aramzemē sētu stiebrzāļu vai lopbarības zālaugu (arī proteīnaugu) maisījums Sarkanais āboliņš Baltais āboliņš Bastarda āboliņš Lucerna Austrumu galega Ragainais vanagnadziņš Amoliņš Pļavas timotiņš sēklas ieguvei Pļavas auzene sēklas ieguvei Hibrīdā airene sēklas ieguvei Daudzziedu viengadīgā airene sēklas ieguvei Sarkanā auzene sēklas ieguvei Ganību airene sēklas ieguvei Niedru auzene sēklas ieguvei Pļavas skarene sēklas ieguvei Kamolzāle sēklas ieguvei Citur neminēta kukurūza Aramzemē sētu stiebrzāļu un tauriņziežu maisījums, kurā tauriņzieži > 50 % Auzeņairene sēklas ieguvei Sarkanais āboliņš sēklas ieguvei Baltais āboliņš sēklas ieguvei Bastarda āboliņš sēklas ieguvei Lucerna sēklas ieguvei Austrumu galega sēklas ieguvei Amoliņš sēklas ieguvei Inkarnāta āboliņš Esparsete sēklas ieguvei Kukurūza biogāzes ieguvei Dažādi kultūraugi nelielā aramzemes platībā jeb vairāki kultūraugi, audzēti vienlaidu laukā, ja katrs no kultūraugiem attiecīgajā laukā aizņem mazāk par 0,1 ha, vai platības, ko izmanto ziedu audzēšanai Kartupeļi, kas citur nav minēti Sēklas kartupeļi Cietes kartupeļi Tomāti Lopbarības bietes, cukurbietes Ziedkāposti Burkāni Galda bietes, mangolds (lapu bietes) Gurķi un kornišoni Sīpoli, šalotes sīpoli, maurloki, lielloku sīpoli un batūni Ķiploki Garšaugi un kultivēti ārstniecības augi (fenhelis, baziliks, timiāns, estragons, anīss, majorāns, oregano jeb raudene, salvija, izops, piparmētra, pupumētra, vērmele, lofants, naktssvece, deviņvīru spēks, ābolmētra, citronmelisa, tauksakne, ehinācija, ārstniecības lupstājs, dižzirdzene, raspodiņš, sirds mātere) Puravi Galda rāceņi, turnepši Selerijas Redīsi un melnie rutki Pētersīļi Pastinaks Galda kāļi Dārza ķirbis, cukīni, kabači, patisoni Parastās jeb dārza pupiņas Skābenes Rabarberi Spināti Mārrutki Salāti Topinambūri Paprika Sparģeļi Citur neminēti kāposti (baltie vai sarkanie galviņkāposti, rožu jeb Briseles kāposti, galda kolrābji, sparģeļkāposti, virziņkāposti jeb Savojas kāposti, lapu kāposti, brokoļi, Pekinas kāposti, izņemot lopbarības kāpostus) Dārzeņi, ja vienlaidu platībā augošas SA atbalsttiesīgās dārzeņu kultūraugu sugas katra aizņem mazāk par 0,1 ha un kopējā saimniecības aramzemes platība nav lielāka par 10 ha Pārējie kultūraugi, sēti tīrsējā aramzemē Pārējie citur neminētie kultūraugi, sēti kā kultūraugu maisījums aramzemē Parastās dilles Sējas koriandrs jeb kinza Ķimene Mārdadzis Kliņģerīte Ārstniecības gurķene Lavanda Lielaugļu ķirbis Muskata ķirbis Kumelīte, vasaras Kumelīte, ziemas Ābeles Bumbieres Plūmes Plūškoks Aronijas Smiltsērkšķis Avenes Upenes Krūmmellenes (zilenes) Zemenes Ērkšķogas Krūmcidonijas Kazenes Citi kultivēti nektāraugi (ežziede, biškrēsliņš, pūķgalve, melisa (citronmētra, citronmelisa), daglītis, dedestiņa, kaķumētra, rudzupuķe) Dārza pīlādži Saldie un skābie ķirši Sarkanās un baltās jāņogas Lielogu dzērvenes Vīnogas Arbūzi un melones Sausserdis Irbene Nektāraugi savstarpējos maisījumos vai citur neminētie nektāraugi (t.sk. zilā kāpnīte, malva, izops, mātere, gurķumētra, salvija, citronmētra, tauksakne, raudene) Augļu koki un ogulāji (izņemot zemenes), ja vienlaidu platībā augošas SA atbalsttiesīgās augļu koku un ogulāju sugas katra aizņem mazāk par 0,1 ha Citur neminēti ilggadīgie stādījumi ēdamo augļu un ogu ieguvei Saulespuķe
    ```

## API Interface proposal

### Request
```json
{
  "code": "70940030280"
}
```

### Response (minimal requirements)
```json
{
  "availableArea": 46687.796678999999
}
```

## Research notes

### Shape object response from patageo.lvmgeo.lv
```json
{
  "displayFieldName": "CODE",
  "fieldAliases": {
      "OBJECTID": "OBJECTID",
      "CODE": "Zemes vienības kadastra apzīmējums",
      "OBJECTCODE": "Objekta veids",
      "GROUP_CODE": "Kadastra grupas kods",
      "GEOM_ACT_D": "Objekta ģeometrijas aktualizācijas datums",
      "AREA_SCALE": "Aprēķinātā poligona platība (ņemot vērā mēroga koeficientu)",
      "SHAPE.AREA": "SHAPE.AREA",
      "SHAPE.LEN": "Perimetrs, m"
  },
  "geometryType": "esriGeometryPolygon",
  "spatialReference": {
      "wkid": 3059,
      "latestWkid": 3059
  },
  "fields": [
      {
          "name": "OBJECTID",
          "type": "esriFieldTypeOID",
          "alias": "OBJECTID"
      },
      {
          "name": "CODE",
          "type": "esriFieldTypeString",
          "alias": "Zemes vienības kadastra apzīmējums",
          "length": 11
      },
      {
          "name": "OBJECTCODE",
          "type": "esriFieldTypeString",
          "alias": "Objekta veids",
          "length": 10
      },
      {
          "name": "GROUP_CODE",
          "type": "esriFieldTypeString",
          "alias": "Kadastra grupas kods",
          "length": 7
      },
      {
          "name": "GEOM_ACT_D",
          "type": "esriFieldTypeDate",
          "alias": "Objekta ģeometrijas aktualizācijas datums",
          "length": 8
      },
      {
          "name": "AREA_SCALE",
          "type": "esriFieldTypeDouble",
          "alias": "Aprēķinātā poligona platība (ņemot vērā mēroga koeficientu)"
      },
      {
          "name": "SHAPE.AREA",
          "type": "esriFieldTypeDouble",
          "alias": "SHAPE.AREA"
      },
      {
          "name": "SHAPE.LEN",
          "type": "esriFieldTypeDouble",
          "alias": "Perimetrs, m"
      }
  ],
  "features": [
      {
          "attributes": {
              "OBJECTID": 640654,
              "CODE": "70940030280",
              "OBJECTCODE": "7201060210",
              "GROUP_CODE": "7094003",
              "GEOM_ACT_D": 1382400000000,
              "AREA_SCALE": 46693.46866577,
              "SHAPE.AREA": 46687.796678999999,
              "SHAPE.LEN": 1006.10685936882
          },
          "geometry": {
              "rings": [
                  [
                      [
                          666182.40000000037,
                          275565.78299999982
                      ],
                      [
                          666198.72599999979,
                          275593.20800000057
                      ],
                      [
                          666220.27400000021,
                          275620.42600000091
                      ],
                      [
                          666240.90600000042,
                          275646.96900000051
                      ],
                      [
                          666268.51699999999,
                          275676.10500000045
                      ],
                      [
                          666300.68400000036,
                          275707.58799999952
                      ],
                      [
                          666517.50100000016,
                          275423.70800000057
                      ],
                      [
                          666525.53899999987,
                          275414.93700000085
                      ],
                      [
                          666495.91199999955,
                          275385.41100000031
                      ],
                      [
                          666459.51300000027,
                          275346.41200000048
                      ],
                      [
                          666452.48099999968,
                          275352.76600000076
                      ],
                      [
                          666298.09100000001,
                          275502.53999999911
                      ],
                      [
                          666185.03500000015,
                          275564.34300000034
                      ],
                      [
                          666182.40000000037,
                          275565.78299999982
                      ]
                  ]
              ]
          }
      }
  ]
}
```
