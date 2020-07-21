const fs = require('fs');
const HDWalletProvider = require("truffle-hdwallet-provider");
const secrets = JSON.parse(
  fs.readFileSync(".secrets").toString().trim()
);

module.exports = {
  networks: {
     development: {
      host: "127.0.0.1",
      port: 7545,
      network_id: "*" // Match any network id
    },
    ropsten: {
      provider: () =>
        new HDWalletProvider(
          secrets.seed,
          `https://ropsten.infura.io/v3/${secrets.projectId}`
        ),
      network_id: 3 
    }
  },
solc: {
    optimizer: {
      enabled: true,
      runs: 200
    }
  }
}