import Web3 from 'web3';
import Covid19_blockchain from '../build/contracts/Covid19_blockchain.json';

let web3;
let crud;

const initWeb3 = () => {
  return new Promise((resolve, reject) => {
    if(typeof window.ethereum !== 'undefined') {
      const web3 = new Web3(window.ethereum);
      window.ethereum.enable()
        .then(() => {
          resolve(
            new Web3(window.ethereum)
          );
        })
        .catch(e => {
          reject(e);
        });
      return;
    }
    if(typeof window.web3 !== 'undefined') {
      return resolve(
        new Web3(window.web3.currentProvider)
      );
    }
    resolve(new Web3('http://localhost:9545'));
  });
};

const initContract = () => {
    const deploymentKey = Object.keys(Covid19_blockchain.networks)[0];
  return new web3.eth.Contract(
      Covid19_blockchain.abi, 
      Covid19_blockchain
      .networks[deploymentKey]
      .address
  );
};

const initApp = () => {
    const $New_state = document.getElementById('New_state');
    const $New_stateResult = document.getElementById('New_state-result');
    const $Search_statename = document.getElementById('Search_statename');
    const $Search_statenameResult = document.getElementById('Search_statename-result');
    const $Update_state = document.getElementById('Update_state');
    const $Update_stateResult = document.getElementById('Update_state-result');
    const $Delete_state = document.getElementById('Delete_state');
    const $Delete_stateResult = document.getElementById('Delete_state-result');
  let accounts = [];

  web3.eth.getAccounts()
  .then(_accounts => {
    accounts = _accounts;
  });

    $New_state.addEventListener('submit', (e) => {
    e.preventDefault();
        const name = e.target.elements[0].value;
        const active = e.target.elements[1].value;
        const effect = e.target.elements[2].value;
        const death = e.target.elements[3].value;
        const recover = e.target.elements[4].value;
        crud.methods.New_state(name,active,effect,death,recover).send({from: accounts[0]})
    .then(result => {
      $New_stateResult.innerHTML = `New State ${name} successfully created`;
    })
    .catch(_e => {
      $New_stateResult.innerHTML = `Ooops... there was an error while trying to create a new state ${name}`;
    });
  });

    $Search_statename.addEventListener('submit', (e) => {
    e.preventDefault();
    const statename = e.target.elements[0].value;
        crud.methods.Search_statename(statename).call()
    .then(result => {
        $Search_statenameResult.innerHTML = `   
${result[2]}   = ${result[3]} ,
${result[4]}   = ${result[5]} , 
${result[6]}   = ${result[7]} ,
${result[8]}   = ${result[9]} ,
${result[10]}  = ${result[11]}`;
    })
    .catch(_e => {
      $Search_statenameResult.innerHTML = `Ooops... there was an error while trying to read state name ${statename}`;
    });
  });

    $Update_state.addEventListener('submit', (e) => {
    e.preventDefault();
        const name = e.target.elements[0].value;
        const active = e.target.elements[1].value;
        const effect = e.target.elements[2].value;
        const death = e.target.elements[3].value;
        const recover = e.target.elements[4].value;
        crud.methods.Update_state(name, active, effect, death, recover).send({ from: accounts[0] })
    .then(result => {
      $Update_stateResult.innerHTML = `${name} has been updated`;
    })
    .catch(_e => {
      $Update_stateResult.innerHTML = `Ooops... there was an error while trying to update details of the state ${name}`;
    });
  });

    $Delete_state.addEventListener('submit', (e) => {
    e.preventDefault();
    const name = e.target.elements[0].value;
        crud.methods.Delete_state(name).send({from: accounts[0]})
    .then(result => {
      $Delete_stateResult.innerHTML = `Deleted state ${name}`;
    })
    .catch(_e => {
      $Delete_stateResult.innerHTML = `Ooops... there was an error while trying to delete state ${name}`;
    });
  });
};

document.addEventListener('DOMContentLoaded', () => {
  initWeb3()
    .then(_web3 => {
      web3 = _web3;
      crud = initContract();
      initApp(); 
    })
        .catch(e => console.log(e.message));
   
});