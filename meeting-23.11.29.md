## Cadastre
### Data source

- https://data.gov.lv/dati/lv/dataset/kadastra-informacijas-sistemas-atvertie-dati/resource/1618f19a-c818-4966-8183-a2e3c108597a?inner_span=True
- https://data.gov.lv/dati/lv/dataset/kadastra-informacijas-sistemas-atvertie-dati/resource/58635c63-8c04-4193-a9f2-ec674c57ae93?inner_span=True


## Shapefile
https://en.wikipedia.org/wiki/Shapefile

## Front app where to update hints
- co2app.getCadastreAvailableSquare

### Документы Зиновия
- https://github.com/zlsheepcity/forest-grow-area-calculator/

## Todo

- Проверить что нам может дать кадастровый API от ЯняСета
  https://developers.kartes.lv/lv/

- Перенести PDF в папку калькулятора (zl)
- Новый функционал с площадью (zl)

- Убрать Atrast Karte кнопку

- Доступы до LVMGEO web app


```
    Object.assign(co2app,{
        CadastreNr: '',
        CadastreStatus: {
            ready: false,
            hasdata: false,
        },
        CadastreData: {
            PropertyCadastreNr: '',
            PropertyName:       '',
            ParcelCadastreNr:   '',
            LandPurposeKindId:  '',
            AddressDataString:  '',
            PropertyTotalArea:   0,
            ParcelArea:          0,
            LandPurposeArea:     0,
            AgricultTotal:       0,
            Bushes:              0,
        },
        CadastrePartsData: [],
    });
    co2app.setCadastreNr = n => { co2app.CadastreNr = n };
    co2app.setCadastreData = data => {
        co2app.CadastreData = {...co2app.CadastreData, ...data};
        co2app.CadastreStatus.ready = true;
        co2app.CadastreStatus.hasdata = !!data.ParcelCadastreNr;
        co2app.onCadastreDataUpdate();
    };
    co2app.setCadastrePartsData = data => {
        co2app.CadastrePartsData = Array.isArray(data) ? data : [];
    }
    co2app.getCadastreAvailableSquare = () => {
        return convertMtoHA(
            1*co2app.CadastreData.AgricultTotal
          + 1*co2app.CadastreData.Bushes
        );
    };