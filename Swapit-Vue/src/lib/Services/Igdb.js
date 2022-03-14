import Publisher from '../Connexion/Publisher'
class Igdb extends Publisher {
  constructor() {
    this.apiKey = 'b0f9b9c9d3e0e9f7f7f0b8c8c7d';
    this.baseUrl = 'https://localhost/api';
    this.headers = {
      'Accept': 'application/json',
      'user-key': this.apiKey
    };
    super(this.baseUrl, this.headers);
  }

  async getGame(id) {
    const url = `/games/${id}`;
    return await this.get(url,id).json();
  }

  async getGames(ids = null) {
    const url = `/games/${ids??'?'}${ids.map(id => `id=${id}`).join('&')}`;
    return await this.get(url,ids).json();
  }

  async getGenre(id) {
    const url = `/genres/${id}`;
    return await this.get(url,id).json();
  }

  async getGenres(ids = null) {
    const url = `/genres/${ids??'?'}${ids.map(id => `id=${id}`).join('&')}`;
    return await this.get(url,ids).json();
  }

    async getPlatform(id) {
    const url = `/platforms/${id}`;
    return await this.get(url,id).json();
  }

    async getPlatforms(ids = null) {
    const url = `/platforms/${ids??'?'}${ids.map(id => `id=${id}`).join('&')}`;
    return await this.get(url,ids).json();
  }

  async getMode(id) {
    const url = `/modes/${id}`;
    return await this.get(url,id).json();
  }

  async getModes(ids = null) {
    const url = `/modes/${ids??'?'}${ids.map(id => `id=${id}`).join('&')}`;
    return await this.get(url,ids).json();
  }
}

export { Igdb };
