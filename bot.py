import discord
import json
from discord.ext import commands


with open ('settings.json','r',encoding='utf8') as jfile:
    jdata=json.load(jfile)

client=discord.Client()



bot=commands.Bot(command_prefix=";")

channel_ID=731101828216782908

@bot.command()
async def cls(ctx,*,msg):
    if ctx.author.id == 614095160829149373:
        await ctx.channel.purge(limit=int(msg)+1)
    else:
        await ctx.send('not is root.')


@bot.event
async def on_message(msg):

    if msg.author != bot.user:
        if msg.content == '030':
            await msg.channel.send('030')
    
    await bot.process_commands(msg)


@bot.event
async def on_ready():
    print("===== Bot On Ready. =====")


@bot.event
async def on_member_join(member):
    channel = bot.get_channel(channel_ID)
    await channel.send(f'{member} join!')


@bot.event
async def on_member_remove(member):
    channel = bot.get_channel(channel_ID)
    await channel.send(f'{member} remove!')


bot.run(jdata['token'])
