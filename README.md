<p align="center">
  <img src="https://raw.githubusercontent.com/doppar/.github/main/logo.svg" width="540">
</p>

Doppar isn't one package pretending to be a framework. It's a core plus a set of first-party packages — queue, search, auth, HTTP, process orchestration — released together, tested together, and built to the same standard. You don't assemble a Doppar app from unrelated third-party pieces; you pick the parts you need from one coherent set.

## The ecosystem

| Package | What it does |
|---|---|
| [doppar/framework](https://github.com/doppar/framework) | The core: routing, HTTP, the container, the ORM, validation. Everything below builds on this. |
| [doppar/queue](https://github.com/doppar/queue) | Database-backed background jobs with process-isolated timeouts — a stuck job gets killed, not left to hang the worker. |
| [doppar/embeds](https://github.com/doppar/embeds) | Semantic search for your models. Locally-computed embeddings, no external API required. |
| [doppar/guard](https://github.com/doppar/guard) | Authorization — gates and policies without wiring your own. |
| [doppar/flarion](https://github.com/doppar/flarion) | API authentication. |
| [doppar/oauthic](https://github.com/doppar/oauthic) | Social login (OAuth) as a first-party package, not a community patchwork. |
| [doppar/orion](https://github.com/doppar/orion) | External process orchestration — run shell commands individually, in concurrency-limited pools, or piped into pipelines. |
| [doppar/airbend](https://github.com/doppar/airbend) | Real-time broadcasting. |
| [doppar/bloom](https://github.com/doppar/bloom) | Bloom filter implementations for probabilistic set membership testing. |
| [doppar/axios](https://github.com/doppar/axios) | A modern HTTP client for outbound requests. |
| [doppar/notifier](https://github.com/doppar/notifier) | Notification delivery across channels. |
| [doppar/ai](https://github.com/doppar/ai) | AI integration, wired into the framework's own conventions. |
| [doppar/insight](https://github.com/doppar/insight) | A profiling and debugging toolbar for local development. |
| [doppar/twig-bridge](https://github.com/doppar/twig-bridge) | Twig templates, if you'd rather not use Doppar's own view engine. |

Every package here is versioned and released alongside the core. Add what your app needs; the rest stays out of your `composer.json`.

## Get started

- **Documentation:** [doppar.com](https://doppar.com/versions/4.x/installation)
- **What's new in 4.x:** [doppar.com/versions/4.x/releases](https://doppar.com/versions/4.x/releases)
- **News and updates:** [blog.doppar.com](https://blog.doppar.com)
- **Doppar tour:** [tour.doppar.com](https://tour.doppar.com)

## Contributing

Thank you for considering contributing to the Doppar framework! The contribution guide can be found in the [Doppar documentation](https://doppar.com/versions/4.x/contributions).

## Code of Conduct

In order to ensure that the Doppar community is welcoming to all, please review and abide by the [Code of Conduct](https://doppar.com/versions/4.x/contributions#code-of-conduct).

## Security Vulnerabilities

Please review [our security policy](https://github.com/doppar/framework/security/policy) on how to report security vulnerabilities.

## License

The Doppar framework is open-sourced software licensed under the [MIT license](LICENSE.md).
