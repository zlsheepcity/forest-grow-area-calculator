## Cadastre data sources
- https://data.gov.lv/dati/lv/dataset/kadastra-informacijas-sistemas-atvertie-dati/resource/1618f19a-c818-4966-8183-a2e3c108597a?inner_span=True
- https://data.gov.lv/dati/lv/dataset/kadastra-informacijas-sistemas-atvertie-dati/resource/58635c63-8c04-4193-a9f2-ec674c57ae93?inner_span=True

## Shapefile
https://en.wikipedia.org/wiki/Shapefile

## Front app where to update hints
- https://co2-dev.pata.lv/lv?do=config

```
    co2app.getCadastreAvailableSquare = () => {
        return convertMtoHA(
            1*co2app.CadastreData.AgricultTotal
          + 1*co2app.CadastreData.Bushes
        );
    };
```

### Документы Зиновия
- https://github.com/zlsheepcity/forest-grow-area-calculator/

## Todo 2023.11.29

- Проверить что нам может дать кадастровый API от ЯняСета
  https://developers.kartes.lv/lv/

- Доступы до LVMGEO web app

- Перенести PDF в папку калькулятора (zl)
- Новый функционал с площадью (zl)
- Убрать Atrast Karte кнопку (zl)
