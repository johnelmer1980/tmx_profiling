export default function Home() {
  return (
    <div className="container">
      <form action="/api/index_2" method="post">
        <img src="/bank.png" width="72" height="72" alt="logo" />
        <h1>Please enter an Org ID, hostname & policy</h1>
        <input type="text" name="org_id" placeholder="Org ID" defaultValue="ctvkbfxp" required />
        <input type="text" name="hostname" placeholder="Host name" defaultValue="h.online-metrix.net" required />
        <input type="text" name="policy" placeholder="Policy" defaultValue="default" required />
        <button type="submit">Continue to sign in</button>
      </form>
    </div>
  );
}