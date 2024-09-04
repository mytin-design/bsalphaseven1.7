// Modules to control application life and create native browser window
const { app, BrowserWindow } = require('electron')
const path = require('node:path')

function createWindow () {
  // Create the browser window.
  const mainWindow = new BrowserWindow({
    width: 800,
    height: 600,
    webPreferences: {
      preload: path.join(__dirname, 'preload.js')
    }
  })

  // and load the index.html of the app.
  mainWindow.loadFile('index.php')

  // Open the DevTools.
  // mainWindow.webContents.openDevTools()
}

// This method will be called when Electron has finished
// initialization and is ready to create browser windows.
// Some APIs can only be used after this event occurs.
app.whenReady().then(() => {
  createWindow()

  app.on('activate', function () {
    // On macOS it's common to re-create a window in the app when the
    // dock icon is clicked and there are no other windows open.
    if (BrowserWindow.getAllWindows().length === 0) createWindow()
  })
})

// Quit when all windows are closed, except on macOS. There, it's common
// for applications and their menu bar to stay active until the user quits
// explicitly with Cmd + Q.
app.on('window-all-closed', function () {
  if (process.platform !== 'darwin') app.quit()
})

// In this file you can include the rest of your app's specific main process
// code. You can also put them in separate files and require them here.


// //update

// // The "autoUpdater" module enables apps to automatically update themselves.
// //
// // For more info, see:
// // https://electronjs.org/docs/api/auto-updater

// const { app, autoUpdater } = require('electron/main')

// app.whenReady().then(() => {
//   const server = './index.php'
//   const feed = `${server}/update/${process.platform}/${app.getVersion()}`

//   // The following code won't work unless the app has been packaged.
//   // You should only use the autoUpdater with packaged and code-signed
//   // versions of your application.
//   try {
//     autoUpdater.setFeedURL(feed)
//   } catch (error) {
//     console.log(error)
//   }

//   // Once you've done that, you can go ahead and ask for updates:
//   // autoUpdater.checkForUpdates()

//   autoUpdater.on('checking-for-update', () => {
//     console.log('The autoUpdater is checking for an update')
//   })

//   autoUpdater.on('update-available', () => {
//     console.log('The autoUpdater has found an update and is now downloading it!')
//   })

//   autoUpdater.on('update-not-available', () => {
//     console.log('The autoUpdater has not found any updates :(')
//   })

//   autoUpdater.on('update-downloaded', (event, notes, name, date) => {
//     console.log('The autoUpdater has downloaded an update!')
//     console.log(`The new release is named ${name} and was released on ${date}`)
//     console.log(`The release notes are: ${notes}`)

//     // The update will automatically be installed the next time the
//     // app launches. If you want to, you can force the installation
//     // now:
//     autoUpdater.quitAndInstall()
//   })
// })


// //crasher

// // Submit crash reports to a remote server.
// //
// // For more info, see:
// // https://electronjs.org/docs/api/crash-reporter

// const { app, BrowserWindow, crashReporter } = require('electron/main')
// const path = require('node:path')

// crashReporter.start({
//   productName: 'System',
//   globalExtra: {
//     _companyName: 'School'
//   },
//   submitURL: './crashreport.php',
//   uploadToServer: true
// })

// app.whenReady().then(() => {
//   const mainWindow = new BrowserWindow({
//     height: 600,
//     width: 600,
//     webPreferences: {
//       preload: path.join(__dirname, 'preload.js')
//     }
//   })
//   mainWindow.loadFile('index.php')

//   mainWindow.webContents.on('render-process-gone', () => {
//     console.log('Window crashed!')
//   })
// })

// //notification 

// // Create OS desktop notifications
// //
// // For more info, see:
// // https://electronjs.org/docs/api/notification
// // https://electronjs.org/docs/tutorial/notifications

// const { app, BrowserWindow, Notification } = require('electron/main')
// const path = require('node:path')

// app.whenReady().then(() => {
//   const mainWindow = new BrowserWindow({
//     height: 600,
//     width: 600,
//     webPreferences: {
//       preload: path.join(__dirname, 'preload.js')
//     }
//   })

//   if (Notification.isSupported()) {
//     const notification = new Notification({
//       title: 'System',
//       subtitle: 'Process Runtime',
//       body: 'Your application is running as intended.',
//       hasReply: true
//     })

//     notification.on('show', () => console.log('Notification shown'))
//     notification.on('click', () => console.log('Notification clicked'))
//     notification.on('close', () => console.log('Notification closed'))
//     notification.on('reply', (event, reply) => {
//       console.log(`Reply: ${reply}`)
//     })

//     notification.show()
//   } else {
//     console.log('Hm, are notifications supported on this system?')
//   }

//   mainWindow.loadFile('index.php')
// })


