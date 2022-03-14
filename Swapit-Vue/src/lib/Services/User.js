import Publisher from '../Connexion/Publisher'
class User extends Publisher {
  constructor() {
    const apiKey = 'b0f9b9c9d3e0e9f7f7f0b8c8c7d';
    const baseUrl = 'https://localhost:81/api';
    const headers = {
      'Accept': 'application/json',
      'user-key': apiKey
    };

    super(baseUrl, headers);
  }

  async getUser(id,properties = null) {
    const url = `/users/${id}${properties?'/?properties%5B%5D='+ properties.map(prop => `${prop}`).join('&properties%5B%5D='):''}`;
    console.log(url);
    return this.get(url);
  }

  async getUsers(ids = null, properties = null) {
    const url = `/users/${ids||properties?'?':''}
      ${
        ids.map(id => `id=[${id}]`).join('&')
      }
      ${
        properties?'properties%5B%5D='+ properties.map(prop => `${prop}`).join('&properties%5B%5D='):''
      }`;
    
    console.log(url);
    return this.get(url);
  }

  async getExchange(id,properties = null) {
    const url = `/exchanges/${id}
      ${
        properties?'properties%5B%5D='+ properties.map(prop => `${prop}`).join('&properties%5B%5D='):''
      }`;
    return this.get(url);
  }

  async getExchanges(ids = null, properties = null) {
    const url = `/exchanges/${ids||properties?'?':''}
    ${ids.map(id => `id=[${id}]`).join('&')}
    ${
      properties?'properties%5B%5D='+ properties.map(prop => `${prop}`).join('&properties%5B%5D='):''
    }`;
    return this.get(url);
  }

  async getOwnGames(id) {
    const url = `/users/${id}/?properties%5B%5D=ownGames`;
    return this.get(url);
  }

  async getWishGames(id) {
    const url = `/platforms/${id}/?properties%5B%5D=wishGames`;
    return this.get(url);
  }
}

export default User;
