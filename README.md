# Eszköznyilvántartó API

Laravel 13, PHP 8.5, MySQL 8.4. REST API szerződésekhez és eszközökhöz.

## Indítás

```sh
docker compose up --build
```

A migrációk induláskor automatikusan lefutnak.

- API: `http://localhost:8080/api`
  - `/contracts`, `/assets` (CRUD)
  - `POST /contracts/{id}/assets` – eszköz hozzáadása szerződéshez (`asset_id`, `serial_number`)
  - `DELETE /contracts/{id}/assets/{assetId}` – eszköz levétele
- OpenAPI dokumentáció: `http://localhost:8080/docs` (Basic Auth: `docs` / `secret`, a `DOCS_USERNAME` / `DOCS_PASSWORD` env-ekkel állítható)
- Az API forgalma az `api_logs` táblába kerül.

## Megjegyzések

- Az eszköz egy eszköztípus. A gyári szám a szerződés–eszköz kapcsolótáblán van, így lehet az N:N kapcsolat, és minden darabnak saját gyári száma.
- Egy gyári szám egy eszköztípusnál csak egyszer szerepelhet, egy eszköztípus pedig egyszer lehet ugyanazon a szerződésen.
- Szerződés vagy eszköz törlésekor a kapcsolatai is törlődnek.

