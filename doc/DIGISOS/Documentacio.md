# 📁 Estructura del Projecte

## 📂 Arrel del Projecte

* **doc/**: Documentació general del projecte.
  * **DIGISOS/**
    * `Documentacio.md`: Documentació principal del projecte.
  
  * **DISSENY/**
    * `Documentacio_heuristics.md`: Anàlisi heurístic de la interfície.
    * `Documentacio_WCAG.md`: Validació d’accessibilitat segons WCAG.
    * `FORMULARI_Accessibilitat.png`: Captura d’accessibilitat del formulari.
    * `LLISTAT_Accessibilitat.png`: Captura d’accessibilitat del llistat.

  * **PROGRAMACIO/**
    * `Documentació_Taiga.md`: Gestió i organització del projecte amb Taiga.
    * `PROJECTE_RICARDO&&KILIAN_CAS_US.jpg`: Cas d’ús del projecte.

---

* **docker-compose.yml**: Configuració Docker del projecte.
* **LICENSE**: Llicència del projecte.
* **README.md**: Informació general i instruccions d’execució.

---

## 🐳 Docker

* **Projecte/**
  * `Dockerfile`: Configuració del contenidor Docker de l’aplicació.

---

## 🗄️ Base de Dades

* **sql/**
  * `01_incidencies_init.sql`: Script SQL inicial de creació i inserció de dades.

---

# 💻 Aplicació Web

## 📂 src/

Directori principal de l’aplicació.

---

### 🔌 Configuració

* `connexio.php`: Connexió global amb MySQL.
* `index.php`: Pantalla inicial de selecció de rol.

---

## 🎨 Estils

### 📂 css/

* `style.css`: Full principal d’estils personalitzats.

---

## 🖼️ Recursos Gràfics

### 📂 photos/

Conté les imatges utilitzades al projecte.

* `admin.jpg`: Icona administrador.
* `tecnic.jpg`: Icona tècnic.
* `user.jpg`: Icona usuari.
* `graphic_class.jpg`: Gràfic estadístic.
* `graphic_tecnic.jpg`: Gràfic de tècnics.
* `logo.png`: Logo principal de l’aplicació.

---

# 👤 Gestió per Rols

## 📂 role/

Conté totes les funcionalitats separades segons el rol.

---

# 🛠️ ADMINISTRADOR

## 📂 role/admin/

### Pantalles principals

* `admin.php`: Panell principal d’administració.
* `adminList.php`: Llistat global d’incidències.

---

### Assignacions

* `assignment.php`: Formulari d’assignació de tècnics.
* `assignmentSave.php`: Inserció de l’assignació a la base de dades.
* `assigmentList.php`: Llistat d’assignacions.
* `updateAssignment.php`: Actualització de dades d’una assignació.

---

### Informes i Estadístiques

* `statistics.php`: Estadístiques generals del sistema.
* `informDepartament.php`: Informe per departaments.
* `informTecnic.php`: Informe per tècnics.

---

# 👨‍🔧 TÈCNIC

## 📂 role/tecnic/

### Gestió d’incidències

* `tecnic.php`: Panell principal del tècnic.
* `tecnicList.php`: Llistat d’incidències amb filtres.
* `findByIncidence.php`: Cerca d’incidències per ID.

---

### Actuacions

* `performance.php`: Formulari de registre d’actuacions.
* `savePerformance.php`: Inserció de les actuacions.
* `performanceByIncidence.php`: Visualització de les actuacions d’una incidència.

---

# 👤 USUARI

## 📂 role/user/

### Gestió d’incidències

* `usuari.php`: Panell principal de l’usuari.
* `registerIncidence.php`: Formulari de creació d’incidències.
* `register.php`: Inserció de la incidència a la base de dades.
* `incidenceList.php`: Llistat d’incidències visibles.
* `findByIdIncidence.php`: Cerca d’incidències per ID.

---

### Actuacions i notificacions

* `performanceByIncidence.php`: Visualització d’actuacions visibles per l’usuari.
* `alert.php`: Confirmació de registre correcte d’incidència.

---

# 🧱 Estructures Compartides

## 📂 structure/

Components reutilitzables de l’aplicació.

---

### Globals

* `header.php`: Capçalera comuna del sistema.
* `footer.php`: Peu de pàgina global.
* `logOut.php`: Botó de tancament de sessió.

---

### NavBars

#### 📂 adminStructure/

* `navBarAdmin.php`: Barra de navegació de l’administrador.

#### 📂 tecnicStructure/

* `navBarTecnic.php`: Barra de navegació del tècnic.

#### 📂 userStructure/

* `navBarUser.php`: Barra de navegació de l’usuari.

---

# 🛠️ Funcionalitats Implementades

## 📋 Gestió d’Incidències

* Creació d’incidències per part dels usuaris.
* Assignació de tècnics i prioritats.
* Classificació per tipus i departament.
* Consulta global i filtrada d’incidències.
* Finalització d’incidències resoltes.

---

## 🧩 Sistema d’Actuacions

* Registre d’actuacions tècniques.
* Control de visibilitat per l’usuari.
* Seguiment cronològic de les actuacions.
* Registre automàtic de temps invertit.
* Resolució automàtica amb `NOW()`.

---

## 🔎 Sistemes de Cerca i Filtres

* Filtrat per:
  * tècnic
  * departament
  * prioritat
* Cerca d’incidències per ID.

---

## 📊 Administració i Estadístiques

* Gestió centralitzada d’incidències.
* Informes per departament.
* Informes per tècnic.
* Estadístiques globals del sistema.

---

# 🎯 Tecnologies Utilitzades

* PHP
* MySQL
* Bootstrap 5
* Docker
* HTML5
* CSS3
