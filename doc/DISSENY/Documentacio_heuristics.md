# Aplicació dels 10 heurístics de Nielsen al gestor d’incidències

## Introducció

Per al desenvolupament del gestor d’incidències s’han aplicat els principis d’usabilitat proposats per Jakob Nielsen.  
Aquests heurístics permeten dissenyar interfícies més intuïtives, eficients i fàcils d’utilitzar per als diferents rols del sistema:

- Administrador
- Tècnic
- Usuari

L’objectiu principal ha estat millorar l’experiència d’ús, reduir errors i facilitar la gestió d’incidències dins de l’aplicació.

---

# 1. Visibilitat de l’estat del sistema

El sistema informa constantment l’usuari sobre l’estat actual de les incidències i de les accions realitzades.

## Aplicació al projecte

### Rol administrador
- Les incidències mostren:
  - prioritat,
  - tècnic assignat,
  - departament,
  - estat de finalització.
- S’utilitzen colors per identificar prioritats:
  - vermell → alta,
  - groc → mitjana,
  - verd → baixa.

### Rol tècnic
- S’informa quan no existeixen incidències disponibles:
```php
No hi ha incidències disponibles.
```

- Es mostren missatges visuals en consultar actuacions o incidències.

### Rol usuari
- L’usuari pot visualitzar l’estat de les seves incidències i les actuacions visibles realitzades pels tècnics.

---

# 2. Correspondència entre el sistema i el món real

L’aplicació utilitza llenguatge i processos similars a un entorn real de suport tècnic.

## Aplicació al projecte

S’utilitzen termes comprensibles i habituals:

- Incidència
- Tècnic
- Departament
- Prioritat
- Actuació
- Resolta

El flux del sistema replica un entorn real:

1. L’usuari crea una incidència.
2. L’administrador l’assigna.
3. El tècnic realitza actuacions.
4. La incidència es marca com a resolta.

---

# 3. Control i llibertat de l’usuari

Els usuaris poden modificar informació i corregir accions fàcilment.

## Aplicació al projecte

### Administrador
- Pot modificar incidències des de:
```php
updateAssignment.php
```

- Pot netejar filtres mitjançant:
```php
Netejar filtres
```

### Tècnic
- Pot:
  - registrar actuacions,
  - consultar actuacions anteriors,
  - marcar incidències com a resoltes.

### Usuari
- Pot consultar les actuacions visibles relacionades amb les seves incidències.

---

# 4. Consistència i estàndards

Tota la interfície manté un disseny homogeni.

## Aplicació al projecte

- Ús consistent de Bootstrap:
  - cards,
  - botons,
  - taules,
  - formularis.

- Totes les pàgines reutilitzen:
```php
navBarAdmin.php
navBarTecnic.php
```

- Els formularis segueixen la mateixa estructura visual:
  - etiquetes,
  - camps,
  - botons d’acció.

---

# 5. Prevenció d’errors

El sistema evita errors abans que es produeixin.

## Aplicació al projecte

### Validació de formularis

Ús de:
```html
required
```

per impedir formularis incomplets.

### Ús de selects

Les dades importants utilitzen `<select>`:
- tècnics,
- prioritats,
- departaments,
- visibilitat.

Això evita entrades incorrectes.

### Validacions backend

Comprovacions com:
```php
if (!$idIncidencia)
```

eviten accessos invàlids.

### Seguretat

Ús de consultes preparades:
```php
$stmt = $mysqli->prepare(...)
```

per prevenir errors i millorar la seguretat.

---

# 6. Reconeixement abans que record

La interfície minimitza la necessitat de memoritzar informació.

## Aplicació al projecte

### Administrador
- Filtres desplegables per:
  - tècnics,
  - departaments,
  - prioritats,
  - tipus.

### Tècnic
- Totes les incidències mostren:
  - descripció,
  - prioritat,
  - departament,
  - data.

### Usuari
- Pot reconèixer ràpidament l’estat d’una incidència gràcies a l’organització visual.

---

# 7. Flexibilitat i eficiència d’ús

El sistema permet realitzar tasques de forma ràpida i eficient.

## Aplicació al projecte

### Administrador
- Filtres avançats per localitzar incidències ràpidament.
- Ordenació automàtica per prioritat:
```sql
ORDER BY FIELD(p.descripcio, 'Alta', 'Mitja', 'Baixa')
```

### Tècnic
- Cerca ràpida d’incidències per ID:
```php
findByIncidence.php
```

- Accés ràpid a actuacions des de la taula principal.

### Responsive design

Ús de Bootstrap per adaptar el sistema a:
- ordinador,
- tauleta,
- mòbil.

---

# 8. Disseny estètic i minimalista

La interfície mostra únicament la informació necessària.

## Aplicació al projecte

- Ús de targetes netes i organitzades.
- Espais consistents:
```html
mb-4
py-5
container
```

- Separació clara entre:
  - administració,
  - incidències,
  - estadístiques,
  - actuacions.

- Disseny visual simple i professional.

---

# 9. Ajudar a reconèixer, diagnosticar i recuperar-se dels errors

El sistema proporciona missatges clars quan es produeix un problema.

## Aplicació al projecte

### Missatges d’error

Exemples:
```php
No s'ha seleccionat cap incidència.
```

```php
No s'ha trobat cap incidència amb aquest ID.
```

```php
Incidència no trobada
```

### Alertes visuals

Ús de:
```html
alert-danger
alert-warning
alert-success
```

per identificar ràpidament situacions importants.

---

# 10. Ajuda i documentació

La interfície proporciona ajuda contextual mitjançant el mateix disseny.

## Aplicació al projecte

- Etiquetes descriptives a tots els formularis.
- Botons clarament identificats:
  - Guardar actuació,
  - Assignar incidència,
  - Modificar,
  - Filtrar.

- Organització clara d’estadístiques i incidències.

- Navegació senzilla mitjançant barres superiors reutilitzables.

---

# Aplicació dels heurístics segons els rols

## Administrador

Funcions principals:
- assignació d’incidències,
- modificació,
- estadístiques,
- filtratge.

Heurístics més aplicats:
- visibilitat del sistema,
- control de l’usuari,
- eficiència d’ús.

---

## Tècnic

Funcions principals:
- visualitzar incidències,
- registrar actuacions,
- resoldre incidències,
- consultar historial.

Heurístics més aplicats:
- reconeixement visual,
- minimalisme,
- prevenció d’errors.

---

## Usuari

Funcions principals:
- crear incidències,
- consultar actuacions visibles,
- revisar l’estat.

Heurístics més aplicats:
- correspondència amb el món real,
- simplicitat,
- feedback visual.

---

# Conclusions

El gestor d’incidències implementa correctament els principis heurístics de Nielsen mitjançant:

- una interfície consistent,
- validacions de formularis,
- feedback visual,
- ús de colors i alertes,
- organització clara de la informació,
- i fluxos de treball intuïtius.

Gràcies a això, el sistema ofereix una experiència d’usuari més eficient i accessible per a administradors, tècnics i usuaris finals.
