# Compliment de les directrius WCAG AA al gestor d’incidències

## Introducció

Durant el desenvolupament del gestor d’incidències s’han aplicat diferents criteris d’accessibilitat basats en les directrius WCAG 2.1 nivell AA (Web Content Accessibility Guidelines).

L’objectiu principal ha estat garantir que l’aplicació sigui:
- accessible,
- comprensible,
- navegable,
- i usable per a tots els usuaris, incloses persones amb discapacitats visuals o motores.

A continuació es mostren diferents criteris WCAG implementats al projecte amb exemples reals del codi.

---

# 1. Navegació accessible mitjançant teclat

## WCAG aplicat
### 2.1.1 Keyboard

Totes les funcionalitats han de ser accessibles mitjançant teclat.

## Aplicació al projecte

S’ha implementat un enllaç per saltar directament al contingut principal:

```html
<a href="#taula-incidencies" class="visually-hidden-focusable">
    Saltar al contingut principal
</a>
```

Aquest element permet:
- evitar navegar repetidament pels menús,
- millorar l’experiència d’usuaris amb teclat,
- facilitar la navegació amb lectors de pantalla.

També s’utilitzen:
- botons accessibles,
- formularis navegables amb tabulació,
- enllaços focusables.

---

# 2. Etiquetes descriptives en formularis

## WCAG aplicat
### 1.3.1 Info and Relationships

La informació i les relacions dels elements han de ser identificables.

## Aplicació al projecte

Tots els camps dels formularis utilitzen etiquetes `<label>` associades correctament:

```html
<label for="descripcio" class="form-label">
    Descripció
</label>
```

```html
<textarea
    id="descripcio"
    name="descripcio"
></textarea>
```

Això permet:
- millorar la compatibilitat amb lectors de pantalla,
- augmentar l’accessibilitat dels formularis,
- facilitar la comprensió dels camps.

---

# 3. Text alternatiu i informació contextual

## WCAG aplicat
### 3.3.2 Labels or Instructions

Els formularis han de proporcionar instruccions clares.

## Aplicació al projecte

S’han afegit textos d’ajuda contextual:

```html
<div id="descripcioForm" class="form-text">
    Introdueix una descripció clara de la incidència.
</div>
```

i associacions mitjançant:

```html
aria-describedby="descripcioForm"
```

Això ajuda:
- usuaris amb dificultats cognitives,
- persones amb lectors de pantalla,
- usuaris novells.

---

# 4. Compatibilitat amb lectors de pantalla

## WCAG aplicat
### 4.1.2 Name, Role, Value

Els components han de tenir nom i funció identificables.

## Aplicació al projecte

S’utilitzen atributs ARIA com:

```html
aria-label="Entrar a la incidència 15"
```

als botons d’acció.

Exemple:

```html
<a
    class="btn btn-sm btn-primary"
    aria-label="Entrar a la incidència <?php echo htmlspecialchars($incidencia['idIncidencia']); ?>"
>
    Entrar
</a>
```

Això permet que els lectors de pantalla:
- descriguin correctament l’acció,
- diferenciïn els botons repetits,
- millorin la navegació.

---

# 5. Indicació de camps obligatoris

## WCAG aplicat
### 3.3.2 Labels or Instructions

Els camps obligatoris han d’estar identificats clarament.

## Aplicació al projecte

Els formularis indiquen camps obligatoris mitjançant:

```html
<span aria-hidden="true">*</span>
```

i:

```html
required
aria-required="true"
```

Exemple:

```html
<textarea
    required
    aria-required="true"
></textarea>
```

Això garanteix:
- validació accessible,
- millor comprensió dels formularis,
- reducció d’errors.

---

# 6. Estructura semàntica correcta

## WCAG aplicat
### 1.3.1 Info and Relationships

La informació ha d’estar estructurada correctament.

## Aplicació al projecte

S’utilitzen:
- encapçalaments jeràrquics,
- taules estructurades,
- etiquetes semàntiques.

Exemple:

```html
<h1>Llistat d’incidències</h1>
```

i:

```html
<th scope="col">Descripció</th>
```

Això facilita:
- la navegació assistida,
- la comprensió de continguts,
- la interpretació de taules.

---

# 7. Taules accessibles

## WCAG aplicat
### 1.3.1 Info and Relationships

Les taules han d’identificar correctament capçaleres i contingut.

## Aplicació al projecte

S’utilitzen:
- `<thead>`
- `<tbody>`
- `<th scope="col">`
- `<caption>`

Exemple:

```html
<caption class="visually-hidden">
    Taula amb el llistat d’incidències registrades
</caption>
```

Aquestes pràctiques:
- milloren la interpretació de les dades,
- faciliten la lectura amb assistència tècnica,
- augmenten l’accessibilitat de les taules.

---

# 8. Missatges d’estat accessibles

## WCAG aplicat
### 4.1.3 Status Messages

Els missatges importants han de ser detectables per tecnologies assistives.

## Aplicació al projecte

S’utilitzen alerts amb rols accessibles:

```html
<div class="alert alert-info" role="status">
    No hi ha incidències registrades.
</div>
```

Això permet:
- informar correctament l’usuari,
- comunicar canvis d’estat,
- millorar l’experiència amb lectors de pantalla.

---

# 9. Contrast visual i components Bootstrap

## WCAG aplicat
### 1.4.3 Contrast (Minimum)

Els colors han de tenir contrast suficient.

## Aplicació al projecte

S’utilitzen components Bootstrap amb:
- contrast adequat,
- colors accessibles,
- botons visibles,
- taules diferenciades.

Exemples:
- `btn-primary`
- `btn-success`
- `table-dark`
- `alert-warning`

Això facilita:
- la lectura,
- la identificació visual,
- l’accessibilitat per persones amb baixa visió.

---

# 10. Disseny responsive i adaptable

## WCAG aplicat
### 1.4.10 Reflow

El contingut ha d’adaptar-se a diferents dispositius sense perdre funcionalitat.

## Aplicació al projecte

S’utilitzen classes responsive de Bootstrap:

```html
col-12 col-md-8 col-lg-6
```

i:

```html
table-responsive
```

Això permet:
- visualització correcta en mòbils,
- adaptació a tauletes,
- millora de la usabilitat en pantalles petites.

---

# Conclusions

El gestor d’incidències implementa múltiples criteris WCAG 2.1 nivell AA per garantir una aplicació més accessible i usable.

Entre les millores aplicades destaquen:
- navegació amb teclat,
- etiquetes accessibles,
- compatibilitat amb lectors de pantalla,
- estructures semàntiques correctes,
- validacions accessibles,
- missatges d’estat,
- i disseny responsive.

Aquestes pràctiques milloren l’experiència d’usuari i permeten que l’aplicació sigui utilitzable per un nombre més ampli de persones.
