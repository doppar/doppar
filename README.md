<p align="center">
    <a href="https://doppar.com" target="_blank">
        <img src="https://raw.githubusercontent.com/doppar/doppar/7138fb0e72cd55256769be6947df3ac48c300700/public/logo.png" width="400">
    </a>
</p>

<p align="center">
<a href="https://github.com/doppar/doppar/actions/workflows/tests.yml"><img src="https://github.com/doppar/doppar/actions/workflows/tests.yml/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/doppar/doppar"><img src="https://img.shields.io/packagist/dt/doppar/doppar" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/doppar/doppar"><img src="https://img.shields.io/packagist/v/doppar/doppar" alt="Latest Stable Version"></a>
<a href="https://github.com/doppar/framework/blob/main/LICENSE"><img src="https://img.shields.io/github/license/doppar/framework" alt="License"></a>
</p>

Doppar is a sleek, next-gen PHP framework crafted to transform web development—combining elegant, intuitive syntax with powerful performance to build scalable, efficient applications effortlessly.

Whether you're a seasoned PHP developer or just diving in, Doppar makes it easy to build powerful applications quickly and cleanly.

---

## 🚀 Why Doppar?

- 🔧 ****Simplicity with Power****: Intuitive architecture that stays out of your way while offering powerful tools.
- 📦 ****Feature-Based Development****: Organize your application by features, not layers.
- ⚡ ****Performance First****: Designed for speed and efficiency, Doppar is lightweight but capable.
- 🎯 ****Scalable & Modular****: Ideal for projects of all sizes—from microservices to full-scale web apps.
- 💡 ****Rich Ecosystem****: Includes Eloquent ORM, route handling, middleware, console tools, session management, and more.
- 🛠️ ****Developer-Focused****: Tools and conventions that simplify development without sacrificing flexibility.

## Core Concepts
Doppar brings together modern PHP practices and simplicity. Here's a taste of what’s available:

- ✅ Routing with parameters and naming
- ✅ Middleware (global & route-specific)
- ✅ Controllers and structured request/response handling
- ✅ Blade-like Views and asset bundling
- ✅ Eloquent ORM
- ✅ CSRF Protection, sessions, cookies, and validation
- ✅ Authentication, encryption, rate limiting
- ✅ Mail, file uploads, caching
- ✅ CLI Console (pool) for development tasks
- ✅ Localization, helpers, and more

## 🔐 API Ready
With API authentication, rate limiting, and JSON-first controllers, Doppar is ready for your next backend. Doppar is built from the ground up with API development in mind. Whether you're creating RESTful services, backend systems for mobile apps, or headless applications for modern frontend frameworks like Vue, React, or Angular—Doppar provides all the tools you need to build secure, scalable, and high-performance APIs.

####  ✨ JSON-First Philosophy

At the core of Doppar’s API readiness is its JSON-first controller structure. Responses are standardized, consistent, and optimized for API consumption. Doppar controllers can be easily configured to return JSON by default, with helpers to format responses, handle pagination, errors, and status codes—so you can focus on your logic, not the boilerplate.

#### 🧩 API Authentication

Doppar includes a flexible and secure API authentication system using **Doppar flarion**, supporting token-based authentication out of the box.

#### 🚦 Rate Limiting

To prevent abuse and improve performance, Doppar provides built-in rate limiting. You can apply rate limits globally, per user, per route, or based on IP. With simple configuration, you can:

  - Protect against brute force attacks
  - Control load on your infrastructure
  - Improve the fairness of resource distribution

Rate limiting is managed via middleware, and it's fully customizable for different route groups (e.g., public vs. authenticated API).

#### 🔒 Security by Default

API security is a first-class concern in Doppar. The framework includes:

  - CSRF protection for web routes
  - Input validation using powerful and flexible rules
  - Request throttling
  - Header-based authentication
  - Encryption and decryption utilities

In short, **Doppar isn't just capable of building APIs—it’s engineered for it**. From robust security features and flexible authentication to clean controller logic and performance-minded architecture, Doppar gives developers everything they need to build modern, production-grade APIs with confidence.

### ⚡ Intelligent Rate Limiting
Prevent abuse and ensure fair usage with Doppar’s advanced rate-limiting features. Configure request thresholds per endpoint, IP, or user to protect your backend from DDoS attacks, brute-force attempts, and excessive API calls. Dynamic rate-limiting rules adapt to traffic patterns, ensuring optimal performance while maintaining service availability for legitimate users.

### 📈 Designed to Scale

Whether you're handling **thousands of requests per minute** or operating within a **microservices architecture**, Doppar is ready. Its modular approach to routing, service containers, and middleware allows you to keep your API logic clean, maintainable, and testable.

### 💡 Contribute or Build Packages
One of Doppar’s greatest strengths is its **modular and extensible architecture**, which allows developers to **extend the framework by building custom packages** or integrating community-contributed modules. Whether you're adding new functionality, creating reusable components, or enhancing core features, **Doppar’s package development tools are designed to make the process seamless and maintainable**.

Doppar enables you to encapsulate features into packages that can be easily reused across multiple projects. This is especially useful for:

By following Doppar’s conventions, your packages can hook into the application's **service container**, **routing**, **middleware**, and more—just like core framework components. This means you can package your features professionally—with the same structure and power as native Doppar components.

Doppar makes package development not just possible, but **enjoyable and powerful**. Whether you're solving a problem for your own project or building tools for the wider community, **Doppar’s extensibility helps you do it cleanly, efficiently, and in a scalable way**.

### 🛠️ Build Something Great
Doppar is designed to get out of your way—so you can build faster and cleaner. From commands (pool) to rich Eloquent ORM tools, Doppar ensures your workflow is smooth and enjoyable.
