# 🚀 TalentPool API

**Assigné par**: Houssni Ouchad  
**Créé le**: 18/03/2025  

**Bute**: Développement d’une API Laravel pour gérer les annonces, les candidatures et le suivi des recrutements pour une entreprise.

**Technologies**: PHP, Git, Web Services, UML

---
## 📌 Contexte Professionnel
### Modernisation des Applications Web avec Laravel et Intégration de REST APIs

**Situation professionnelle**
Modernisation des Applications Web avec Laravel et l'Intégration de REST APIs

**Besoin visé ou problème rencontré**
- Modernisation des applications web existantes pour répondre aux besoins changeants du marché et des utilisateurs. 
- Intégration de nouvelles fonctionnalités via des REST APIs pour améliorer la performance et l'expérience utilisateur. 
- Défi : migrer d'une architecture legacy à une architecture flexible tout en intégrant des services externes via des REST APIs.

**Compétences visées**

| Compétences | Niveau |
|------------|--------|
| Contribuer au pilotage de l’organisation du travail individuel et collectif afin de faciliter la communication, la collaboration et la gestion des imprévus au sein de l’équipe | niveau 3, transposerValidé |
| Définir le périmètre d’un problème rencontré en adoptant une démarche inductive afin de permettre la recherche de solution | niveau 3, transposerValidé |
| Rechercher de façon méthodique une ou des solutions au problème rencontré afin de retenir une solution adaptée au contexte | niveau 3, transposerValidé |
| Partager la solution adoptée en utilisant les moyens de partage de connaissance ou de documentation disponibles afin de contribuer au développement de la connaissance de l’entreprise | niveau 3, transposerValidé |
| Présenter un travail réalisé en synthétisant ses résultats, sa démarche et en répondant aux questions afin de le restituer au commanditaire | niveau 3, transposerValidé |
| Se familiariser avec les codes et la culture propres à son environnement professionnel afin d’y faciliter son intégration | niveau 3, transposerValidé |
| Interagir dans un contexte professionnel de façon respectueuse et constructive pour favoriser la collaboration | niveau 3, transposerValidé |
| Faciliter un temps de travail collectif en assurant une communication constructive entre les participants dans un cadre de travail clair pour permettre l’implication de tous | niveau 3, transposerValidé |
| Mettre en place une base de données relationnelle | niveau 3, transposerValidé |
| Développer des composants d’accès aux données SQL et NoSQL | niveau 3, transposerValidé |
| Développer des composants métier coté serveur | niveau 3, transposerValidé |
| Documenter le déploiement d’une application dynamique web ou web mobile | niveau 2, adapterValidé |


**Ressources**
![endpoints.png](https://simplonline-v3-prod.s3.eu-west-3.amazonaws.com/media/image/png/endpoints-67d9dd93e17eb685146900.png)

**Contexte du projet**
- Une entreprise souhaite développer une solution de gestion des recrutements pour faciliter la mise en relation entre recruteurs et candidats. En tant que développeur, tu es chargé de concevoir une API en Laravel qui permettra de gérer les annonces, les candidatures et le suivi des recrutements. L’architecture devra intégrer le Repository Pattern et une couche Service pour assurer la modularité et la maintenabilité du code.

---
## 🎯 Fonctionnalités

### 📢 Gestion des Annonces
- ✏️ En tant que **recruteur**, je veux _ajouter (create)_, _modifier (update)_ et _supprimer (delete)_ une annonce.
- 🔍 En tant que **candidat**, je veux _récupérer la liste des annonces (read)_ et leurs _détails (read)_ pour postuler.

### 📄 Gestion des Candidatures
- 📤 En tant que **candidat**, je veux _postuler (create)_ à une annonce en envoyant mon _CV_ et ma _lettre de motivation_.
- ❌ En tant que **candidat**, je veux _retirer (delete)_ ma candidature.
- 🎚️ En tant que **recruteur**, je veux _filtrer (search)_ et _récupérer (read)_ les candidatures associées à mes annonces.
​
### 🔄 Suivi des Candidatures
- 🔄 En tant que **recruteur**, je veux _mettre à jour (update)_ le statut d’une candidature.
- ✉️ En tant que **candidat**, je veux être _notifié_ d’un changement de statut par _email_.
​

### 🔐 Authentification & Sécurité
- 👤 En tant qu’**utilisateur**, je veux m’_inscrire_ et me _connecter_ avec _JWT_ ou _Sanctum_.
- 🔄 En tant qu’**utilisateur**, je veux _réinitialiser_ mon _mot de passe_.
- 🏷️ À l’inscription, l’**utilisateur** _choisit son rôle_ (candidat ou recruteur), et celui-ci _ne peut être changé_.

### 📊 Statistiques & Rapports
- En tant que **recruteur**, je veux obtenir des _statistiques_ sur mes _annonces_ et _candidatures_.
- En tant qu’**administrateur**, je veux obtenir des _statistiques globales_ sur l’utilisation de la plateforme.
​

## 🔧 Points Clés

- 🛡️ JWT ou Sanctum pour l’authentification sécurisée.
- 🔒 Permissions basées sur Laravel Gates & Policies pour restreindre l’accès selon les rôles.
- Candidats et recruteurs s’inscrivent et choisissent leur rôle dès le départ.
- Statistiques pour recruteurs et administrateurs afin d’analyser l’activité de la plateforme.
- 📝 En tant que développeur, je veux une documentation détaillée de l’API.
- 🧪 Mise en place de tests unitaires (avec PHPUnit ou Pest) pour les fonctionnalités clés de l'API.

---
## 📋 Modalités Pédagogiques
- **Type**: Travail individuel
- **Durée**: 8 jours
- **Dates**:
  - 🚀 Lancement: 19/03/2025 à 09h30
  - ⏳ Deadline: 28/03/2025 avant 16h00

---
## 📝 Modalités d'Évaluation
**Présentation (1h)**:
1. 🎬 Démo API sous Postman (5min)
2. 💻 Explication du code (10min)
3. ❓ Quizz Q/R (45min)

---
## 📦 Livrables Requis
- 📊 Diagrammes UML
- 💾 Code source documenté
- 🗃️ Base de données avec données de test
- 📤 Collection Postman
- 📚 Documentation technique (Swagger ou alternative)
